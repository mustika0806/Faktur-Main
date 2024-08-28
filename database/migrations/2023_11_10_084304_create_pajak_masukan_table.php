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
        Schema::create('pajak_masukan', function (Blueprint $table) {
            $table->char('no_faktur', 20)->primary();
            $table->char('npwp_lawan', 20)->unique();
            $table->date('tgl_faktur');
            $table->integer('masa_pajak');
            $table->integer('tahun_pajak');
            $table->enum('kredit', ['1', '0']);
            $table->integer('jumlah_dpp');
            $table->integer('jumlah_ppn');
            $table->integer('jumlah_ppnbm');
            $table->string('status', 255);
            $table->string('tgl_aprov', 255);
            $table->string('ket', 255);
            $table->integer('user_perekam')->unique();
            $table->datetime('tgl_rekam');
            $table->integer('user_pengubah')->unique();
            $table->datetime('tgl_ubah')->nullable();
            // Tambahkan kolom lain jika diperlukan
            // $table->tipe('nama_kolom', panjang)->opsi();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pajak_masukan');
    }
};
