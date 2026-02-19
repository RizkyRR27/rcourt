<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_rewards', function (Blueprint $table) {
            $table->string('sport_type')->nullable()->after('reward_type');
        });
    }

    public function down(): void
    {
        Schema::table('user_rewards', function (Blueprint $table) {
            $table->dropColumn('sport_type');
        });
    }
};
