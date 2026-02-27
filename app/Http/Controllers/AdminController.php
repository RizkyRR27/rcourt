<?php

namespace App\Http\Controllers;

use App\Models\LoyaltyProgress;
use App\Models\UserReward;
use App\Helpers\PricingHelper;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    // 1. TAMPILKAN SEMUA BOOKING
    public function index()
    {
        $bookings = Booking::with(['court'])->latest()->paginate(10);
        return view('admin.index', compact('bookings'));
    }

    // 2. PROSES APPROVE / REJECT (KHUSUS WHATSAPP)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $booking = Booking::findOrFail($id);

        $oldStatus = $booking->status;
        $newStatus = $request->status;

        // Update Status di Database
        $booking->update(['status' => $newStatus]);

        if ($newStatus == 'approved' && $oldStatus != 'approved') {

            // a. Hitung Durasi Main (Selisih Jam)
            $start = \Carbon\Carbon::parse($booking->start_time);
            $end = \Carbon\Carbon::parse($booking->end_time);

            // Jika end < start (misal 00:00 < 23:00), berarti lewat tengah malam (Time Wrap)
            // Maka end-nya dianggap besoknya
            if ($end->lt($start)) {
                $end->addDay();
            }

            $hours = abs($end->diffInHours($start));

            // b. Ambil Tipe Olahraga (Karena progress dipisah per cabang)
            $sportType = $booking->court->type;

            // c. Ambil Data Progress User (Buat baru jika belum ada)
            // Pastikan Anda sudah import model: use App\Models\LoyaltyProgress;
            $progress = LoyaltyProgress::firstOrCreate(
                ['user_id' => $booking->user_id, 'sport_type' => $sportType],
                ['total_hours' => 0]
            );

            // d. Tambahkan Jam Main ke Progress
            $progress->total_hours += $hours;

            // e. Cek Apakah Tembus 30 Jam?
            if ($progress->total_hours >= 30) {
                // RESET POIN: Kurangi 30 jam
                // (Sisa jam, misal total 32, maka sisa 2 jam tetap disimpan untuk periode berikutnya)
                // Gunakan max(0, ...) sebagai safeguard agar tidak minus
                $progress->total_hours = max(0, $progress->total_hours - 30);

                // BERIKAN HADIAH (UserReward)
                // Pastikan Anda sudah import model: use App\Models\UserReward;
                UserReward::create([
                    'user_id' => $booking->user_id,
                    'reward_type' => 'pending', // Pending = User belum milih hadiah
                    'sport_type' => $sportType, // Jenis olahraga asal klaim
                    'is_used' => false
                ]);
            }

            // Simpan Perubahan Poin ke Database
            $progress->save();
        }


        // ======================================================
        // 🚀 LOGIKA PENGIRIMAN NOTIFIKASI WHATSAPP
        // ======================================================

        if ($booking->phone) {
            try {
                $this->sendWhatsappNotification($booking, $newStatus);
            } catch (\Exception $e) {
                // Jika WA gagal, aplikasi tidak error, cuma dicatat di log
                Log::error("Gagal kirim WA Booking ID " . $booking->id . ": " . $e->getMessage());
                return redirect()->back()->with('warning', 'Status berubah, tapi WA gagal terkirim (Cek Token Fonnte).');
            }
        }

        return redirect()->back()->with('success', 'Status berhasil diubah & Notifikasi WA dikirim!');
    }

    // FUNCTION KIRIM WA (FONNTE)
    private function sendWhatsappNotification($booking, $status)
    {
        $target = $booking->phone;

        // Format Pesan
        if ($status == 'approved') {
            $pesan = "*HALO! BOOKING ANDA DITERIMA* ✅\n\n" .
                "Hai, booking lapangan Anda sudah kami validasi.\n\n" .
                "📅 Tanggal: " . \Carbon\Carbon::parse($booking->date)->format('d F Y') . "\n" .
                "⏰ Jam: {$booking->start_time} s/d {$booking->end_time}\n" .
                "🏟️ Lapangan: {$booking->court->name}\n\n" .
                "Silakan tunjukkan pesan ini kepada petugas saat datang. Terima kasih!";
        } else {
            $pesan = "*MOHON MAAF, BOOKING DITOLAK* ❌\n\n" .
                "Booking lapangan untuk tanggal " . \Carbon\Carbon::parse($booking->date)->format('d F Y') . " tidak dapat kami terima.\n\n" .
                "Alasan: Slot waktu penuh atau bukti pembayaran tidak valid.\n" .
                "Silakan cek website kami untuk info slot lainnya.";
        }

        // Kirim via Fonnte API (token dari config/services.php)
        $token = config('services.fonnte.token');

        if (!$token) {
            Log::warning("Fonnte token belum dikonfigurasi. Set FONNTE_API_TOKEN di .env");
            return;
        }

        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'Authorization' => $token,
        ])->post('https://api.fonnte.com/send', [
            'target' => $target,
            'message' => $pesan,
            'countryCode' => '62',
        ]);

        if ($response->failed()) {
            Log::error("Fonnte API Error (Booking #{$booking->id}): " . $response->body());
        }
    }

    // 3. EXTEND BOOKING (Tambah Jam)
    public function extendBooking(Request $request, $id)
    {
        $request->validate([
            'extend_hours' => 'required|integer|min:1|max:4'
        ]);

        $booking = Booking::with('court')->findOrFail($id);

        // Hanya booking approved yang bisa di-extend
        if ($booking->status !== 'approved') {
            return redirect()->back()->with('error', 'Hanya booking yang sudah approved bisa di-extend.');
        }

        // Cek apakah sudah pernah extend
        if ($booking->is_extended) {
            return redirect()->back()->with('error', 'Booking ini sudah pernah di-extend. Tidak bisa extend lagi.');
        }

        // Cek apakah booking sudah lewat (tanggal atau jam)
        $now = \Carbon\Carbon::now();
        $dateStr = \Carbon\Carbon::parse($booking->date)->format('Y-m-d');

        // Cek apakah end_time sudah jam 24:00 (tutup) — bisa disimpan sebagai '24:00:00' atau '00:00:00'
        $isAtClosing = in_array($booking->end_time, ['24:00:00', '00:00:00']);

        if ($isAtClosing) {
            $bookingEndDateTime = \Carbon\Carbon::parse($dateStr)->addDay();
        } else {
            $bookingEndDateTime = \Carbon\Carbon::parse($dateStr . ' ' . $booking->end_time);
        }

        if ($now->greaterThanOrEqualTo($bookingEndDateTime)) {
            return redirect()->back()->with('error', 'Tidak bisa extend! Booking ini sudah melewati waktu bermain.');
        }

        if ($isAtClosing) {
            return redirect()->back()->with('error', 'Tidak bisa extend! Jam akhir sudah mencapai batas operasional (24:00).');
        }

        $extendHours = (int) $request->extend_hours;
        $currentEnd = \Carbon\Carbon::parse($booking->end_time);
        $newEnd = $currentEnd->copy()->addHours($extendHours);
        $newEndHour = (int) $currentEnd->format('H') + $extendHours;

        // Batas operasional: max jam 24
        if ($newEndHour > 24) {
            return redirect()->back()->with('error', 'Tidak bisa extend melewati jam operasional (max 24:00).');
        }

        // Simpan konsisten sebagai 24:00:00 jika tepat tengah malam
        $newEndStr = ($newEndHour == 24) ? '24:00:00' : $newEnd->format('H:i:s');

        // Cek bentrok dengan booking lain di court & tanggal yang sama
        $hasConflict = Booking::where('court_id', $booking->court_id)
            ->where('date', $booking->date)
            ->where('id', '!=', $booking->id)
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($currentEnd, $newEndStr) {
                // Cek apakah ada booking yang overlap di rentang waktu extend
                $query->where('start_time', '<', $newEndStr)
                    ->where('end_time', '>', $currentEnd->format('H:i:s'));
            })
            ->exists();

        if ($hasConflict) {
            return redirect()->back()->with('error', 'Tidak bisa extend! Ada booking lain di jam tersebut.');
        }

        // Hitung harga tambahan via PricingHelper
        $courtType = $booking->court->type;
        $additionalPrice = PricingHelper::calculateTotal(
            $courtType,
            $booking->date,
            $currentEnd->format('H:i:s'),
            $newEndStr
        );

        // Update booking
        $booking->update([
            'end_time' => $newEndStr,
            'total_price' => $booking->total_price + $additionalPrice,
            'is_extended' => true,
            'extend_cost' => $booking->extend_cost + $additionalPrice,
            'extend_duration' => $booking->extend_duration + $extendHours,
        ]);

        return redirect()->back()->with(
            'success',
            'Booking berhasil di-extend ' . $extendHours . ' jam! Tambahan biaya: Rp ' . number_format($additionalPrice, 0, ',', '.')
        );
    }
}
