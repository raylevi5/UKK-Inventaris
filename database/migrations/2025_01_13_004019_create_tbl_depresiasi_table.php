<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDepresiasiTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel tbl_depresiasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_depresiasi', function (Blueprint $table) {
            $table->id('id_depresiasi'); // id_depresiasi sebagai primary key
            $table->integer('lama_depresiasi'); // kolom lama_depresiasi dengan tipe integer
            $table->string('keterangan', 50); // kolom keterangan dengan tipe string dan panjang 50 karakter
            $table->timestamps(); // menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel tbl_depresiasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_depresiasi');
    }
}
