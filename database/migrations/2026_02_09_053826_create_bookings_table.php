<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('court_id')->constrained()->onDelete('cascade');
        
        $table->date('date'); // Tanggal Main
        $table->time('start_time'); // Jam Mulai
        $table->time('end_time'); // Jam Selesai
        
        $table->decimal('total_price', 10, 2); // Harga yang harus dibayar
        
        // Opsi Pembayaran: Transfer atau Bayar di Tempat (COD)
        $table->enum('payment_method', ['transfer', 'cod']); 
        
        // Tipe Bayar: DP atau Lunas
        $table->enum('payment_type', ['full', 'dp'])->nullable(); 
        
        // Bukti Bayar (Path file gambar)
        $table->string('payment_proof')->nullable(); 
        
        // Status Booking
        // Pending: Baru booking/Upload bukti
        // Approved: Admin sudah ACC
        // Rejected: Admin tolak
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
