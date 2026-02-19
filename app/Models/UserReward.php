<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReward extends Model
{
    protected $fillable = ['user_id', 'reward_type', 'sport_type', 'is_used'];
}
