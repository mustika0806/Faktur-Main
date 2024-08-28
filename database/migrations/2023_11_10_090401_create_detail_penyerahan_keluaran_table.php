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
        Schema::create('detail_penyerahan_keluaran', function (Blueprint $table) {
            $table->id();
            $table->char('kode_brg', 20)->unique();
            $table->integer('jmlh_brg');
            $table->integer('harga_total');
            $table->integer('diskon');
            $table->integer('dpp');
            $table->integer('ppn');
            $table->integer('ppnbm');
            $table->integer('pajak_ppnbm');
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
        Schema::dropIfExists('detail_penyerahan_keluaran');
    }
};
