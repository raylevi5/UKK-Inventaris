<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_pengadaan', function (Blueprint $table) {
            $table->id('id_pengadaan'); // ID Primary Key
            $table->integer('id_master_barang'); // Kolom id_master_barang bertipe INT // foreign key
            $table->integer('id_depresiasi'); // Kolom id_depresiasi bertipe INT // foreign key
            $table->integer('id_merk'); // Kolom id_merk bertipe INT // foreign key
            $table->integer('id_satuan'); // Kolom id_satuan bertipe INT // foreign key
            $table->integer('id_sub_kategori_asset'); // Kolom id_sub_kategori_asset bertipe INT // foreign key
            $table->integer('id_distributor'); // Kolom id_distributor bertipe INT // foreign key
            $table->string('kode_pengadaan', 20); // Kolom kode_pengadaan bertipe VARCHAR(20)
            $table->string('no_invoice', 20); // Kolom no_invoice bertipe VARCHAR(20)
            $table->string('no_seri_barang', 50); // Kolom no_seri_barang bertipe VARCHAR(50)
            $table->string('tahun_produksi', 5); // Kolom tahun_produksi bertipe VARCHAR(5)
            $table->integer('jumlah_stok'); // Kolom jumlah_stok bertipe INT
            $table->date('tgl_pengadaan'); // Kolom tgl_pengadaan bertipe DATE
            $table->integer('harga_barang'); // Kolom harga_barang bertipe INT
            $table->integer('nilai_barang'); // Kolom nilai_barang bertipe INT
            $table->integer('usia_barang'); // Menambahkan kolom usia barang (dalam bulan)
            $table->decimal('depresiasi_barang', 12, 2); // Menambahkan kolom depresiasi dengan 2 desimal
            $table->enum('fb', ['0', '1']); // Kolom fb bertipe ENUM('0', '1')
            $table->string('keterangan', 50)->nullable(); // Kolom keterangan bertipe VARCHAR(50), nullable
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
        Schema::dropIfExists('tbl_pengadaan');
    }
};