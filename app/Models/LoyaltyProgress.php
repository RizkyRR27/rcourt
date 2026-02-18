<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoyaltyProgress extends Model {
    protected $table = 'loyalty_progress';
    protected $fillable = ['user_id', 'sport_type', 'total_hours'];
}