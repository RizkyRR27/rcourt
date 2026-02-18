<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('code')->unique()->nullable()->after('id');
        });

        // Isi kode untuk data lama yang belum punya code
        $bookings = DB::table('bookings')->whereNull('code')->get();
        foreach ($bookings as $booking) {
            DB::table('bookings')
                ->where('id', $booking->id)
                ->update(['code' => 'RCRT-' . strtoupper(substr(md5($booking->id . $booking->created_at), 0, 6))]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('code');
        });
    }
};
