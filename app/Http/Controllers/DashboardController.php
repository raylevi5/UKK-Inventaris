<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarang;
use App\Models\Distributor;
use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\Depresiasi;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\MutasiLokasi;
use App\Models\Opname;
use App\Models\HitungDepresiasi;

class DashboardController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $totalMasterBarang = MasterBarang::count();
        $totalDistributor = Distributor::count();
        $totalKategoriAsset = KategoriAsset::count();
        $totalSubKategoriAsset = SubKategoriAsset::count();
        $totalMerk = Merk::count();
        $totalSatuan = Satuan::count();
        $totalDepresiasi = Depresiasi::count();
        $totalPengadaan = Pengadaan::count();
        $totalLokasi = Lokasi::count();
        $totalMutasiLokasi = MutasiLokasi::count();
        $totalOpname = Opname::count();
        $totalHitungDepresiasi = HitungDepresiasi::count();
    
        return view('agent.dashboard', compact(
            'totalMasterBarang',
            'totalDistributor', 
            'totalKategoriAsset',
            'totalSubKategoriAsset',
            'totalMerk',
            'totalSatuan', 
            'totalDepresiasi',
            'totalPengadaan',
            'totalLokasi',
            'totalMutasiLokasi',
            'totalOpname',
            'totalHitungDepresiasi'
        ));
    }

    public function masterBarang()
    {
        $barang = MasterBarang::all();

        return view('agent.master_barang', compact('barang')); // Pastikan view ini sudah ada
    }

    public function distributor()
    {
        $distributors = Distributor::all();

        return view('agent.distributor', compact('distributors')); // Pastikan view ini sudah ada
    }

    public function kategoriAsset()
    {
        $kategoriAssets = KategoriAsset::all();

        return view('agent.kategori_asset', compact('kategoriAssets')); // Pastikan view ini sudah ada
    }

    public function subKategoriAsset()
    {
        $subKategoriAssets = SubKategoriAsset::all();

        return view('agent.sub_kategori_asset', compact('subKategoriAssets')); // Pastikan view ini sudah ada
    }

    public function merk()
    {
        $merks = Merk::all();

        return view('agent.merk', compact('merks')); // Pastikan view ini sudah ada
    }

    public function satuan()
    {
        $satuans = Satuan::all();

        return view('agent.satuan', compact('satuans')); // Pastikan view ini sudah ada
    }

    public function depresiasi()
    {
        $depresiasis = Depresiasi::all();

        return view('agent.depresiasi', compact('depresiasis')); // Pastikan view ini sudah ada
    }

    public function lokasi()
    {
        $lokasis = Lokasi::all();

        return view('agent.lokasi', compact('lokasis')); // Pastikan view ini sudah ada
    }

    public function pengadaan()
    {
        $pengadaans = Pengadaan::all();

        return view('agent.pengadaan', compact('pengadaans')); // Pastikan view ini sudah ada
    }

    public function mutasiLokasi()
    {
        $mutasiLokasis = MutasiLokasi::all();

        return view('agent.mutasi_lokasi', compact('mutasiLokasis')); // Pastikan view ini sudah ada
    }

    public function opname()
    {
        $opnames = Opname::all();

        return view('agent.opname', compact('opnames')); // Pastikan view ini sudah ada
    }

    public function hitungDepresiasi()
    {
        $hitungDepresiasis = HitungDepresiasi::all();

        return view('agent.hitung_depresiasi', compact('hitungDepresiasis')); // Pastikan view ini sudah ada
    }
}
