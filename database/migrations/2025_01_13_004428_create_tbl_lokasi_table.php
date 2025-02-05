<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLokasiTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lokasi', function (Blueprint $table) {
            $table->id('id_lokasi');
            $table->string('kode_lokasi', 20);
            $table->string('nama_lokasi', 200); // Sesuaikan panjang karakter jika diperlukan
            $table->string('keterangan', 50)->nullable(); // Kolom keterangan boleh null
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Bungkus migrasi jika terjadi kesalahan.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_lokasi');
    }
}
