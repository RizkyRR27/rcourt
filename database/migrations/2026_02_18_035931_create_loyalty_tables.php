<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    // 1. Tabel Progress Poin (Per Olahraga)
    Schema::create('loyalty_progress', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('sport_type'); // badminton, futsal, dll
        $table->integer('total_hours')->default(0); // Progress saat ini (0-30)
        $table->timestamps();
    });

    // 2. Tabel Hadiah User
    Schema::create('user_rewards', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        // Pilihan: 'pending' (belum pilih), 'discount', 'tumbler', 'towel', 'voucher'
        $table->string('reward_type')->default('pending'); 
        $table->boolean('is_used')->default(false); // False = Belum dipakai/diambil
        $table->timestamps();
    });
}
};
