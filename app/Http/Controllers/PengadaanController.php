<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\MasterBarang;
use App\Models\Depresiasi;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengadaanController extends Controller
{
    public function index()
{
    $pengadaans = Pengadaan::with([
        'masterBarang',
        'depresiasi', 
        'merk',
        'satuan',
        'subKategoriAsset',
        'distributor'
    ])->get();

    return view('admin.pengadaan.index', compact('pengadaans'));
}

    public function create()
    {
        $masterBarangs = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        // dd($depresiasis);
        $merks = Merk::all();
        $satuans = Satuan::all();
        $subKategoriAssets = SubKategoriAsset::all();
        $distributors = Distributor::all();

        return view('admin.pengadaan.create', compact(
            'masterBarangs',
            'depresiasis',
            'merks', 
            'satuans',
            'subKategoriAssets',
            'distributors'
        ));
    }

    private function calculateDepreciation($hargaBarang, $lamaDepresiasi) 
{
    // Avoid division by zero
    if ($lamaDepresiasi <= 0) {
        return 0;
    }
    return $hargaBarang / $lamaDepresiasi;
}

    public function store(Request $request) 
    {
        try {
            $validatedData = $request->validate([
                'id_master_barang' => 'required|exists:tbl_master_barang,id_barang',
                'id_depresiasi' => 'required|exists:tbl_depresiasi,id_depresiasi',
                'id_merk' => 'required|exists:tbl_merk,id_merk',
                'id_satuan' => 'required|exists:tbl_satuan,id_satuan',
                'id_sub_kategori_asset' => 'required|exists:tbl_sub_kategori_asset,id_sub_kategori_asset',
                'id_distributor' => 'required|exists:tbl_distributor,id_distributor',
                'kode_pengadaan' => 'required|string|max:20',
                'no_invoice' => 'required|string|max:20',
                'no_seri_barang' => 'required|string|max:50',
                'tahun_produksi' => 'required|string|max:5',
                'tgl_pengadaan' => 'required|date',
                'harga_barang' => 'required|integer',
                'nilai_barang' => 'required|integer',
                'fb' => 'required|in:0,1',
                'keterangan' => 'nullable|string|max:50'
            ]);

            //Get Depresiasi data
            $depresiasi = Depresiasi::find($request->id_depresiasi);
        $validatedData['usia_barang'] = $depresiasi->lama_depresiasi * 12; // Convert years to months
        
        // Calculate depreciation: harga_barang / lama_depresiasi
        $validatedData['depresiasi_barang'] = $this->calculateDepreciation(
            $validatedData['harga_barang'],
            $depresiasi->lama_depresiasi
        );

        $pengadaan = Pengadaan::create($validatedData);

        return redirect()
            ->route('admin.pengadaan.index')
            ->with('success', 'Pengadaan berhasil ditambahkan.');

    } catch (\Exception $e) {
        \Log::error('Error creating pengadaan:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        return back()->with('error', 'Terjadi kesalahan saat menambah pengadaan.');

        } catch (\Exception $e) {
            \Log::error('Error creating pengadaan:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput()
                ->withErrors(['error' => 'Gagal menyimpan: ' . $e->getMessage()]);
        }
    }

    public function edit(Pengadaan $pengadaan)
    {
        $masterBarangs = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        $merks = Merk::all();
        $satuans = Satuan::all(); 
        $subKategoriAssets = SubKategoriAsset::all();
        $distributors = Distributor::all();

        return view('admin.pengadaan.edit', compact(
            'pengadaan',
            'masterBarangs',
            'depresiasis',
            'merks',
            'satuans',
            'subKategoriAssets',
            'distributors'
        ));
    }

    public function update(Request $request, Pengadaan $pengadaan)
    {
        $validatedData = $request->validate([
            'id_master_barang' => 'required',
            'id_depresiasi' => 'required', 
            'id_merk' => 'required',
            'id_satuan' => 'required',
            'id_sub_kategori_asset' => 'required',
            'id_distributor' => 'required',
            'kode_pengadaan' => 'required|string|max:20',
            'no_invoice' => 'required|string|max:20',
            'no_seri_barang' => 'required|string|max:50',
            'tahun_produksi' => 'required|string|max:5',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required',
            'keterangan' => 'nullable|string|max:50'
        ]);

        // Recalculate depreciation on update
        $depresiasi = Depresiasi::find($request->id_depresiasi);
        $validatedData['usia_barang'] = $depresiasi->lama_depresiasi * 12;
        $validatedData['depresiasi_barang'] = $this->calculateDepreciation(
            $validatedData['harga_barang'],
            $validatedData['usia_barang'],
            $validatedData['tgl_pengadaan']
        );

        $pengadaan->update($validatedData);
        return redirect()->route('admin.pengadaan.index')->with('success', 'Pengadaan berhasil diupdate.');
    }

    public function destroy(Pengadaan $pengadaan)
    {
        $pengadaan->delete();
        return redirect()->route('admin.pengadaan.index')->with('success', 'Pengadaan berhasil dihapus.');
    }

    public function depresiasiBarang()
    {
        $nilaiPerBulan = $this->harga_barang / $this->usia_barang;
        $bulanBerjalan = Carbon::parse($this->tgl_pengadaan)->diffInMonths(now());
        $nilaiSekarang = $this->harga_barang - ($nilaiPerBulan * $bulanBerjalan);
        
        return max(0, $nilaiSekarang); // Memastikan nilai tidak negatif
    }

    public function detail(Pengadaan $pengadaan)
    {
        return view('admin.pengadaan.detail', compact('pengadaan'));
    }
}