<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HitungDepresiasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_hitung_depresiasi';
    protected $primaryKey = 'id_hitung_depresiasi';

    protected $fillable = [
        'id_pengadaan',
        'tgl_hitung_depresiasi',
        'bulan',
        'durasi',
        'nilai_barang'
    ];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan', 'id_pengadaan');
    }

    public function hitungNilaiPenyusutan()
    {
        // Prevent division by zero
        if ($this->durasi <= 0) {
            return 0;
        }
        return $this->nilai_barang / $this->durasi;
    }

    public function hitungNilaiBulanIni()
    {
        $penyusutan = $this->hitungNilaiPenyusutan();
        $bulanBerjalan = $this->hitungBulanBerjalan();
        
        // Ensure value doesn't go below 0
        $nilaiSaatIni = $this->nilai_barang - ($penyusutan * $bulanBerjalan);
        return max(0, $nilaiSaatIni);
    }

    private function hitungBulanBerjalan()
    {
        $tanggalHitung = \Carbon\Carbon::parse($this->tgl_hitung_depresiasi);
        $tanggalSekarang = \Carbon\Carbon::now();
        return $tanggalHitung->diffInMonths($tanggalSekarang);
    }

    public function hitungSisaDepresiasi()
    {
        // Validation to prevent division by zero
        if ($this->durasi <= 0 || $this->nilai_barang <= 0) {
            return [
                'nilai_penyusutan_per_bulan' => 0,
                'bulan_berlalu' => 0,
                'total_penyusutan' => 0,
                'nilai_saat_ini' => 0,
                'error' => 'Durasi atau nilai barang tidak valid'
            ];
        }

        try {
            // Hitung nilai penyusutan per bulan
            $nilai_penyusutan_per_bulan = $this->nilai_barang / $this->durasi;

            // Hitung berapa bulan telah berlalu
            $tgl_hitung = Carbon::parse($this->tgl_hitung_depresiasi);
            $bulan_berlalu = $tgl_hitung->diffInMonths(Carbon::now());

            // Hitung total penyusutan
            $total_penyusutan = $nilai_penyusutan_per_bulan * $bulan_berlalu;

            // Hitung nilai saat ini
            $nilai_saat_ini = $this->nilai_barang - $total_penyusutan;

            // Pastikan nilai tidak kurang dari 0
            $nilai_saat_ini = max(0, $nilai_saat_ini);

            return [
                'nilai_penyusutan_per_bulan' => round($nilai_penyusutan_per_bulan),
                'bulan_berlalu' => $bulan_berlalu,
                'total_penyusutan' => round($total_penyusutan),
                'nilai_saat_ini' => round($nilai_saat_ini),
                'error' => null
            ];
        } catch (\Exception $e) {
            return [
                'nilai_penyusutan_per_bulan' => 0,
                'bulan_berlalu' => 0,
                'total_penyusutan' => 0,
                'nilai_saat_ini' => 0,
                'error' => 'Terjadi kesalahan dalam perhitungan'
            ];
        }
    }
}