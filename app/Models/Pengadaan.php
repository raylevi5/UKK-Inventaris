<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengadaan';
    protected $primaryKey = 'id_pengadaan';

    protected $fillable = [
        'id_master_barang',
        'id_depresiasi',
        'id_merk',
        'id_satuan',
        'id_sub_kategori_asset',
        'id_distributor',
        'kode_pengadaan',
        'no_invoice',
        'no_seri_barang',
        'tahun_produksi',
        'jumlah_stok',
        'tgl_pengadaan',
        'harga_barang',
        'nilai_barang',
        'fb',
        'keterangan',
        'usia_barang',
        'depresiasi_barang'
    ];

    public function masterBarang()
    {
        return $this->belongsTo(MasterBarang::class, 'id_master_barang', 'id_barang');
    }

    public function depresiasi()
    {
        return $this->belongsTo(Depresiasi::class, 'id_depresiasi', 'id_depresiasi');
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id_merk');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id_satuan');
    }

    public function subKategoriAsset()
    {
        return $this->belongsTo(SubKategoriAsset::class, 'id_sub_kategori_asset', 'id_sub_kategori_asset');
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor', 'id_distributor');
    }

    public function mutasiLokasis()
    {
        return $this->hasMany(MutasiLokasi::class, 'id_pengadaan');
    }

    public function opnames()
    {
        return $this->hasMany(Opname::class, 'id_pengadaan');
    }

    public function hitungDepresiasis()
    {
        return $this->hasMany(HitungDepresiasi::class, 'id_pengadaan');
    }
}