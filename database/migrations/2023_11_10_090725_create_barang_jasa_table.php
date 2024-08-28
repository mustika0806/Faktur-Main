<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
  {
    public function up()    
    {
        Schema::create('barang_jasa', function (Blueprint $table) {
            $table->char('kode_brg_jasa', 20)->primary();
            $table->string('nama_brg_jasa', 50);
            $table->integer('harga');
            // Tambahkan kolom lain jika diperlukan
            // $table->tipe('nama_kolom', panjang)->opsi();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_jasa');
    }
};
