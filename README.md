# 🏸 RCOURT — Sistem Booking Lapangan Olahraga

<p align="center">
  <strong>Platform reservasi lapangan olahraga online dengan desain modern Neo-Brutalism.</strong>
</p>

---

## 📖 Tentang Project

**RCOURT** adalah aplikasi web untuk booking lapangan olahraga secara online. Dibangun menggunakan **Laravel 12** dengan desain **Neo-Brutalism / Retro Sports** yang modern dan responsif. Aplikasi ini mempermudah pengguna dalam memesan lapangan dan mempermudah admin dalam mengelola jadwal serta status booking.

### Jenis Lapangan yang Tersedia

| Olahraga | Tipe |
|---|---|
| 🏸 Badminton | Indoor |
| ⚽ Futsal | Indoor |
| 🏀 Basket Indoor | Indoor |
| 🎾 Tennis | Outdoor |
| 🥅 Mini Soccer | Outdoor |
| 🤾 Padel | Indoor |

## ✨ Fitur Utama

- **Booking Online** — Pilih tanggal, jenis lapangan, dan jadwal yang tersedia secara real-time.
- **Halaman Checkout** — Proses konfirmasi dan pembayaran booking.
- **Riwayat Booking** — Lihat riwayat dan detail tiket booking yang pernah dibuat.
- **Admin Dashboard** — Kelola dan approve/reject booking dari pengguna.
- **Turnamen** — Informasi turnamen yang tersedia.
- **Halaman Kontak** — Hubungi pengelola lapangan.
- **Desain Responsif** — Tampilan optimal di desktop maupun mobile.

## 🛠️ Tech Stack

| Layer | Teknologi |
|---|---|
| Backend | Laravel 12, PHP 8.2+ |
| Frontend | Blade Templates, Tailwind CSS 4 |
| Build Tool | Vite 7 |
| Database | MySQL / SQLite |

## 🚀 Instalasi & Setup

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL / SQLite

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/RizkyRR27/rcourt.git
cd rcourt

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Konfigurasi database di file .env, lalu jalankan migrasi
php artisan migrate

# 5. Jalankan aplikasi
php artisan serve
npm run dev
```

Atau gunakan shortcut:

```bash
composer setup    # Install semua dependency & build assets
composer dev      # Jalankan server, queue, logs, dan Vite sekaligus
```

## 📁 Struktur Halaman

| Route | Deskripsi |
|---|---|
| `/` | Halaman utama (Home) |
| `/booking` | Form booking — pilih tanggal & jenis lapangan |
| `/booking/search` | Pencarian jadwal yang tersedia |
| `/booking/checkout` | Halaman checkout/pembayaran |
| `/riwayat` | Riwayat booking pengguna |
| `/riwayat/{id}/tiket` | Detail tiket booking |
| `/turnamen` | Halaman informasi turnamen |
| `/contact` | Halaman kontak |
| `/admin` | Dashboard admin |

## 📝 Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
