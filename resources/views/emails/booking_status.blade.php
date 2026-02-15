<!DOCTYPE html>
<html>
<head>
    <title>Status Booking</title>
</head>
<body style="font-family: monospace; background-color: #f3f4f6; padding: 20px;">
    
    <div style="background-color: white; border: 2px solid black; padding: 20px; max-width: 600px; margin: auto; box-shadow: 4px 4px 0px black;">
        <h2 style="text-transform: uppercase; margin-top: 0;">
            @if($statusType == 'approved')
                Selamat! Booking Diterima 🎉
            @else
                Mohon Maaf, Booking Ditolak 😔
            @endif
        </h2>

        <p>Halo,</p>
        <p>Berikut adalah update status untuk booking lapangan Anda:</p>

        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">Tanggal Main</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">{{ \Carbon\Carbon::parse($booking->date)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">Jam</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">{{ $booking->start_time }} s/d {{ $booking->end_time }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">Lapangan</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">{{ $booking->court->name }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">Status</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold; text-transform: uppercase;">
                    @if($statusType == 'approved')
                        <span style="color: green;">DITERIMA / LUNAS</span>
                    @else
                        <span style="color: red;">DITOLAK / PENUH</span>
                    @endif
                </td>
            </tr>
        </table>

        @if($statusType == 'approved')
            <p>Silakan tunjukkan email ini kepada petugas saat datang ke lokasi.</p>
            <div style="text-align: center; margin-top: 20px;">
                <a href="#" style="background-color: black; color: white; padding: 10px 20px; text-decoration: none; font-weight: bold; display: inline-block;">DOWNLOAD INVOICE</a>
            </div>
        @else
            <p>Mohon maaf, kemungkinan slot waktu tersebut sudah terisi atau bukti pembayaran tidak valid. Silakan lakukan booking ulang.</p>
        @endif

        <p style="margin-top: 30px; font-size: 12px; color: gray;">Terima kasih,<br>Tim Arena Sport Center</p>
    </div>

</body>
</html>