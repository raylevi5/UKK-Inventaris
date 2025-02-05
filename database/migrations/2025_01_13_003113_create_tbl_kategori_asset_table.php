<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKategoriAssetTable extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kategori_asset', function (Blueprint $table) {
            $table->id('id_kategori_asset'); // Auto increment, primary key
            $table->string('kode_kategori_asset', 20); // Kolom kode kategori asset
            $table->string('kategori_asset', 25); // Kolom kategori asset
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Membalikkan migration, menghapus tabel.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kategori_asset');
    }
}
