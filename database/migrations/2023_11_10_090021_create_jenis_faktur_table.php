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
       {
        Schema::create('jenis_faktur', function (Blueprint $table) {
            $table->char('id', 11)->primary();
            $table->string('nama', 50);
            // Tambahkan kolom lain jika diperlukan
            // $table->tipe('nama_kolom', panjang)->opsi();
            $table->timestamps();
        });
    }
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_faktur');
    }
};
