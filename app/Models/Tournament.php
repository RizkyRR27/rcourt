<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tournament extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public static function findBlockingEvent($date)
    {
        $userDate = Carbon::parse($date);
        $dateString = $userDate->format('Y-m-d'); // Format pasti YYYY-MM-DD

        // 1. Cek Event Sekali Jalan (Gunakan angka 0 untuk TiDB)
        $oneTimeEvent = self::where('is_recurring', 0)
            ->where('start_date', '<=', $dateString)
            ->where('end_date', '>=', $dateString)
            ->first();

        if ($oneTimeEvent) {
            return $oneTimeEvent;
        }

        // 2. Cek Event Tahunan/Berulang (Gunakan angka 1)
        $recurringEvents = self::where('is_recurring', 1)->get();

        foreach ($recurringEvents as $event) {
            $start = Carbon::parse($event->start_date)
                ->setYear($userDate->year)
                ->startOfDay();

            $end = Carbon::parse($event->end_date)
                ->setYear($userDate->year)
                ->endOfDay();

            if ($userDate->between($start, $end)) {
                return $event;
            }
        }

        return null;
    }
}