<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOpnameTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_opname', function (Blueprint $table) {
            $table->id('id_opname'); // Membuat kolom id_opname dengan tipe BIGINT (auto increment)
            $table->Integer('id_pengadaan'); // Membuat kolom id_pengadaan dengan tipe INT
            $table->date('tgl_opname'); // Membuat kolom tgl_opname dengan tipe DATE
            $table->string('kondisi', 25); // Membuat kolom kondisi dengan tipe VARCHAR(25)
            $table->string('keterangan', 100); // Membuat kolom keterangan dengan tipe VARCHAR(100)
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
        Schema::dropIfExists('tbl_opname');
    }
}
