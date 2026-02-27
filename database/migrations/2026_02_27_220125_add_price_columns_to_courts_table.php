<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Tambah kolom harga ke tabel courts.
     * Sebelumnya harga di-hardcode di controller.
     */
    public function up(): void
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->unsignedInteger('price')->default(0)->after('type');         // Harga weekday per jam
            $table->unsignedInteger('weekend_price')->default(0)->after('price'); // Harga weekend per jam
        });

        // Isi harga default berdasarkan tipe lapangan yang sudah ada
        $prices = [
            'badminton'     => ['price' => 30000,  'weekend_price' => 45000],
            'futsal'        => ['price' => 90000,  'weekend_price' => 110000],
            'basket_indoor' => ['price' => 200000, 'weekend_price' => 230000],
            'tennis'        => ['price' => 70000,  'weekend_price' => 90000],
            'mini_soccer'   => ['price' => 650000, 'weekend_price' => 700000],
            'padel'         => ['price' => 300000, 'weekend_price' => 320000],
        ];

        foreach ($prices as $type => $values) {
            DB::table('courts')
                ->where('type', $type)
                ->update($values);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->dropColumn(['price', 'weekend_price']);
        });
    }
};
