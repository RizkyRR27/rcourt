<?php

namespace App\Helpers;

use Carbon\Carbon;

/**
 * Centralized pricing logic for court bookings.
 * Satu sumber kebenaran (single source of truth) untuk semua kalkulasi harga.
 */
class PricingHelper
{
    /**
     * Harga dasar per jam (weekday) untuk setiap jenis lapangan.
     */
    private const BASE_PRICES = [
        'badminton'     => 30000,
        'futsal'        => 90000,
        'basket_indoor' => 200000,
        'tennis'        => 70000,
        'mini_soccer'   => 650000,
        'padel'         => 300000,
    ];

    /**
     * Harga dasar per jam (weekend) untuk setiap jenis lapangan.
     */
    private const WEEKEND_PRICES = [
        'badminton'     => 45000,
        'futsal'        => 110000,
        'basket_indoor' => 230000,
        'tennis'        => 90000,
        'mini_soccer'   => 700000,
        'padel'         => 320000,
    ];

    /**
     * Biaya lampu malam (>=17:00) per jam untuk setiap jenis lapangan.
     */
    private const LIGHT_FEES = [
        'mini_soccer'   => 50000,
        'tennis'        => 30000,
        'padel'         => 30000,
        'futsal'        => 25000,
        'basket_indoor' => 25000,
        'badminton'     => 10000,
    ];

    /**
     * Harga default jika tipe lapangan tidak dikenali.
     */
    private const DEFAULT_PRICE = 50000;
    private const DEFAULT_LIGHT_FEE = 10000;

    /**
     * Hitung total harga booking berdasarkan tipe lapangan, tanggal, dan waktu.
     *
     * @param string $courtType  Tipe lapangan (badminton, futsal, dll)
     * @param string $date       Tanggal booking (Y-m-d)
     * @param string $startTime  Waktu mulai (HH:MM:SS)
     * @param string $endTime    Waktu selesai (HH:MM:SS)
     * @return int Total harga dalam Rupiah
     */
    public static function calculateTotal(string $courtType, string $date, string $startTime, string $endTime): int
    {
        $isWeekend = Carbon::parse($date)->isWeekend();
        $startHour = (int) Carbon::parse($startTime)->format('H');
        $endHour   = (int) Carbon::parse($endTime)->format('H');

        // Handle jam 00:00 = 24:00 (tengah malam = tutup)
        if ($endHour === 0) {
            $endHour = 24;
        }

        $duration = $endHour - $startHour;
        $totalPrice = 0;

        for ($h = 0; $h < $duration; $h++) {
            $currentHour = $startHour + $h;

            // Harga dasar per jam
            $hourPrice = $isWeekend
                ? (self::WEEKEND_PRICES[$courtType] ?? self::DEFAULT_PRICE)
                : (self::BASE_PRICES[$courtType] ?? self::DEFAULT_PRICE);

            // Biaya lampu malam (>=17:00)
            if ($currentHour >= 17) {
                $hourPrice += self::LIGHT_FEES[$courtType] ?? self::DEFAULT_LIGHT_FEE;
            }

            $totalPrice += $hourPrice;
        }

        return $totalPrice;
    }

    /**
     * Hitung harga per jam (tanpa lampu) berdasarkan tipe dan weekend/weekday.
     */
    public static function getHourlyRate(string $courtType, bool $isWeekend): int
    {
        return $isWeekend
            ? (self::WEEKEND_PRICES[$courtType] ?? self::DEFAULT_PRICE)
            : (self::BASE_PRICES[$courtType] ?? self::DEFAULT_PRICE);
    }

    /**
     * Ambil biaya lampu malam berdasarkan tipe lapangan.
     */
    public static function getLightFee(string $courtType): int
    {
        return self::LIGHT_FEES[$courtType] ?? self::DEFAULT_LIGHT_FEE;
    }
}
