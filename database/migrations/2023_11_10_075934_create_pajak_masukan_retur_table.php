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
        Schema::create('pajak_masukan_retur', function (Blueprint $table) {
            $table->char('npwp_lawan', 20)->unique();
            $table->char('nomor_faktur', 20)->unique();
            $table->char('nomor_dokumen', 20)->primary();
            $table->date('tgl_retur');
            $table->char('masa_pajak', 11);
            $table->integer('dpp');
            $table->integer('ppn');
            $table->integer('ppnbm');
            // Tambahkan kolom lain jika diperlukan
            // $table->tipe('nama_kolom', panjang)->opsi();

            // Tambahkan kolom created_at dan updated_at secara otomatis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pajak_masukan_retur');
    }
};
