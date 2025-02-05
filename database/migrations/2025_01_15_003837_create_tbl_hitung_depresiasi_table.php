<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHitungDepresiasiTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hitung_depresiasi', function (Blueprint $table) {
            $table->id('id_hitung_depresiasi'); // Membuat kolom id_hitung_depresiasi dengan tipe BIGINT (auto increment)
            $table->Integer('id_pengadaan'); // Membuat kolom id_pengadaan dengan tipe INT
            $table->date('tgl_hitung_depresiasi'); // Membuat kolom tgl_hitung_depresiasi dengan tipe DATE
            $table->string('bulan', 10); // Membuat kolom bulan dengan tipe VARCHAR(10)
            $table->integer('durasi'); // Membuat kolom durasi dengan tipe INT
            $table->integer('nilai_barang'); // Membuat kolom nilai_barang dengan tipe INT
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
        Schema::dropIfExists('tbl_hitung_depresiasi');
    }
}
