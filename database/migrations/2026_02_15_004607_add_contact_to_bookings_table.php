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
    Schema::table('bookings', function (Blueprint $table) {
        // Kita buat nullable, tapi nanti di Validasi kita paksa salah satu harus isi
        $table->string('email')->nullable()->after('status');
        $table->string('phone')->nullable()->after('email');
    });
}

public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn(['email', 'phone']);
    });
}
};
