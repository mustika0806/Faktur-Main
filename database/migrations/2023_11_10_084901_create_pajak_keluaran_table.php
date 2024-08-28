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
        Schema::create('pajak_keluaran', function (Blueprint $table) {
            $table->id('id_pajak_keluaran');
            $table->integer('nomor_seri_faktur')->unique();
            $table->integer('masa_pajak');
            $table->integer('tahun_pajak');
            $table->date('tanggal_faktur');
            $table->char('npwp', 25)->unique();
            $table->integer('jumlah_dpp');
            $table->integer('jumlah_ppn');
            $table->integer('jumlah_ppnbm');
            $table->integer('uang_muka_dpp');
            $table->integer('uang_muka_ppn');
            $table->integer('uang_muka_ppnbm');
            $table->char('refrensi', 25);
            $table->char('kode_jenis_transaksi', 11)->index();
            $table->char('id_faktur', 11)->index();
            $table->integer('id_7')->index();
            $table->integer('id_8')->index();
            $table->char('id_uang', 11)->unique();
            $table->integer('id_detail')->unique();
            $table->integer('user')->unique();
            $table->datetime('tgl_rekam');
            $table->datetime('tgl_ubah');
            // Tambahkan kolom lain jika diperlukan
            // $table->tipe('nama_kolom', panjang)->opsi();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pajak_keluaran');
    }
};
