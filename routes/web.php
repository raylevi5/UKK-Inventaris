<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;

use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\KategoriAssetController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SubKategoriAssetController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\DepresiasiController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\MutasiLokasiController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\HitungDepresiasiController;
use App\Models\MasterBarang;
use App\Models\Distributor;
use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\Depresiasi;
use App\Models\Pengadaan;
use App\Models\Lokasi;
use App\Models\MutasiLokasi;
use App\Models\Opname;
use App\Models\HitungDepresiasi;
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
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
    return view('dashboard',compact('totalMasterBarang','totalDistributor','totalKategoriAsset','totalSubKategoriAsset','totalMerk','totalSatuan','totalDepresiasi','totalPengadaan','totalLokasi','totalMutasiLokasi','totalOpname','totalHitungDepresiasi'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('master_barang', MasterBarangController::class);
    Route::resource('distributor', DistributorController::class);
    Route::resource('kategori_asset', KategoriAssetController::class);
    Route::resource('satuan', SatuanController::class);
    Route::resource('sub_kategori_asset', SubKategoriAssetController::class);
    Route::resource('merk', MerkController::class);
    Route::resource('depresiasi', DepresiasiController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('pengadaan', PengadaanController::class);
    Route::resource('mutasi_lokasi', MutasiLokasiController::class);
    Route::resource('opname', OpnameController::class);
    Route::resource('hitung_depresiasi', HitungDepresiasiController::class);
    Route::get('pengadaan/{pengadaan}/detail', [PengadaanController::class, 'detail'])->name('pengadaan.detail');
    Route::get(uri: 'hitung_depresiasi/{hitung_depresiasi}/detail', action: [HitungDepresiasiController::class, 'detail'])->name('hitung_depresiasi.detail');
});

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/master-barang', [AgentController::class, 'masterBarang'])->name('agent.master_barang');
    Route::get('/distributor', [AgentController::class, 'distributor'])->name('agent.distributor');
    Route::get('/kategori-asset', [AgentController::class, 'kategoriAsset'])->name('agent.kategori_asset');
    Route::get('/satuan', [AgentController::class, 'satuan'])->name('agent.satuan');
    Route::get('/sub-kategori-asset', [AgentController::class, 'subKategoriAsset'])->name('agent.sub_kategori_asset');
    Route::get('/merk', [AgentController::class, 'merk'])->name('agent.merk');
    Route::get('/depresiasi', [AgentController::class, 'depresiasi'])->name('agent.depresiasi');
    Route::get('/lokasi', [AgentController::class, 'lokasi'])->name('agent.lokasi');
    Route::get('/pengadaan', [AgentController::class, 'pengadaan'])->name('agent.pengadaan');
    Route::get('/pengadaan/{id}/detail', [AgentController::class, 'detailPengadaan'])->name('agent.detail_pengadaan');
    Route::get('/mutasi-lokasi', [AgentController::class, 'mutasiLokasi'])->name('agent.mutasi_lokasi');
    Route::get('/opname', [AgentController::class, 'opname'])->name('agent.opname');
    Route::get('/hitung-depresiasi', [AgentController::class, 'hitungDepresiasi'])->name('agent.hitung_depresiasi');
    Route::get('/hitung-depresiasi/{id}/detail', [AgentController::class, 'detailHitungDepresiasi'])
        ->name('agent.detail_hitung_depresiasi');
});

require __DIR__.'/auth.php';

require __DIR__.'/auth.php';
