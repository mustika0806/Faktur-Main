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
        Schema::create('lawan_transaksi', function (Blueprint $table) {
            $table->char('npwp_lawan', 20)->primary();
            $table->string('nama_lawan', 100);
            $table->string('jalan', 100);
            $table->char('blok', 50);
            $table->char('nomor', 11);
            $table->char('rt', 11);
            $table->char('rw', 11);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('kabupaten', 50);
            $table->string('provinsi', 30);
            $table->char('kode_pos', 11);
            $table->char('no_tlp', 15);
            // Tambahkan kolom lain jika diperlukan
            // $table->tipe('nama_kolom', panjang)->opsi();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawan_transaksi');
    }
};
