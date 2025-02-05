<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubKategoriAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_kategori_asset', function (Blueprint $table) {
            $table->id('id_sub_kategori_asset'); // ID Primary Key
            $table->integer('id_kategori_asset'); // Kolom id_kategori_asset bertipe INT
            $table->string('kode_sub_kategori_asset', 20); // Kolom kode_sub_kategori_asset bertipe VARCHAR(20)
            $table->string('sub_kategori_asset', 25); // Kolom sub_kategori_asset bertipe VARCHAR(25)
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sub_kategori_asset');
    }
}
