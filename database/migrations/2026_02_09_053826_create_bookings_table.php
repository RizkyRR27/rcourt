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
        
        $table->date('date'); 
        $table->time('start_time');         
        $table->time('end_time'); 
        
        $table->decimal('total_price', 10, 2); 
        
        // Opsi Pembayaran
        $table->enum('payment_method', ['transfer', 'cod']); 
        
        // Tipe Bayar: DP atau Lunas
        $table->enum('payment_type', ['full', 'dp'])->nullable(); 
        
        // Bukti Bayar (Path file gambar)
        $table->string('payment_proof')->nullable(); 
       
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
