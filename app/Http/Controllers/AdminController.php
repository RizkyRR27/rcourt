<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Log; // Tetap pakai Log untuk debugging

class AdminController extends Controller
{
    // 1. TAMPILKAN SEMUA BOOKING
    public function index()
    {
        $bookings = Booking::with(['court'])->latest()->get();
        return view('admin.index', compact('bookings'));
    }

    // 2. PROSES APPROVE / REJECT (KHUSUS WHATSAPP)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $booking = Booking::findOrFail($id);
        $status = $request->status; 

        // Update Status di Database
        $booking->update(['status' => $status]);

        // ======================================================
        // 🚀 LOGIKA PENGIRIMAN NOTIFIKASI WHATSAPP
        // ======================================================
        
        if ($booking->phone) {
            try {
                $this->sendWhatsappNotification($booking, $status);
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
        if($status == 'approved') {
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