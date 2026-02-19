<?php

namespace App\Http\Controllers;

use App\Models\LoyaltyProgress;
use App\Models\UserReward;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Log; // Tetap pakai Log untuk debugging

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

        // --- SKRIP API FONNTE ---
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $pesan,
                'countryCode' => '62', // Otomatis ubah 08 jadi 628
            ),
            CURLOPT_HTTPHEADER => array(
                // GANTI TOKEN DI BAWAH INI DENGAN TOKEN ANDA
                "Authorization: BpWsSn2H4cADV7kzaJW5"
            ),
        ));

        $response = curl_exec($curl);

        // Cek error cURL
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            Log::error("Fonnte cURL Error: " . $error_msg);
        }

        curl_close($curl);
    }
}
