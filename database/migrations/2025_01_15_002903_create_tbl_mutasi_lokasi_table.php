<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMutasiLokasiTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mutasi_lokasi', function (Blueprint $table) {
            $table->id('id_mutasi_lokasi'); // Membuat kolom id_mutasi_lokasi dengan tipe BIGINT (auto increment)
            $table->Integer('id_lokasi'); // Membuat kolom id_lokasi dengan tipe INT
            $table->Integer('id_pengadaan'); // Membuat kolom id_pengadaan dengan tipe INT
            $table->string('flag_lokasi', 45); // Membuat kolom flag_lokasi dengan tipe VARCHAR(45)
            $table->string('flag_pindah', 45); // Membuat kolom flag_pindah dengan tipe VARCHAR(45)
            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }

    /**
     * Rollback migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_mutasi_lokasi');
    }
}
