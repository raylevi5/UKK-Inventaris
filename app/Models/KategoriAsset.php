<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAsset extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_asset';

    protected $primaryKey = 'id_kategori_asset';

    protected $fillable = [
        'kode_kategori_asset',
        'kategori_asset',
    ];
}