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
        Schema::create('referensi_no_faktur', function (Blueprint $table) {
            $table->id();
            $table->char('no_faktur_awal', 20);
            $table->char('no_faktur_akhir', 20);
            $table->char('nomor_terakhir', 20);
            $table->date('tgl_rekam');
            $table->date('tgl_update');
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
        Schema::dropIfExists('referensi_no_faktur');
    }
};
