<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMerkTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel tbl_merk.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_merk', function (Blueprint $table) {
            $table->id('id_merk'); // id_merk sebagai primary key
            $table->string('merk', 50); // kolom merk dengan tipe string dan panjang 50 karakter
            $table->string('keterangan', 50); // kolom keterangan dengan tipe string dan panjang 50 karakter
            $table->timestamps(); // menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel tbl_merk.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_merk');
    }
}
