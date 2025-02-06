<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = 'tbl_master_barang'; // Nama tabel yang sesuai

    protected $primaryKey = 'id_barang'; // Tentukan primary key jika berbeda dari default 'id'

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'spesifikasi_teknis',
    ];

    public function pengadaans()
    {
        return $this->hasMany(Pengadaan::class, 'id_master_barang');
    }
}
