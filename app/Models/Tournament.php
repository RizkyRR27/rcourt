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

        $oneTimeEvent = self::where('is_recurring', false)
            ->whereDate('start_date', '<=', $userDate)
            ->whereDate('end_date', '>=', $userDate)
            ->first();

        if ($oneTimeEvent) {
            return $oneTimeEvent;
        }

        $recurringEvents = self::where('is_recurring', true)->get();

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