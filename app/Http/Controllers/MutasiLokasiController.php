<?php

namespace App\Http\Controllers;

use App\Models\MutasiLokasi;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class MutasiLokasiController extends Controller
{
    public function index()
    {
        $mutasiLokasis = MutasiLokasi::with(['lokasi', 'pengadaan'])->get();
        return view('admin.mutasi_lokasi.index', compact('mutasiLokasis'));
    }

    public function create()
    {
        $lokasis = Lokasi::all();
        $pengadaans = Pengadaan::all();
        return view('admin.mutasi_lokasi.create', compact('lokasis', 'pengadaans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_lokasi' => 'required|integer',
            'id_pengadaan' => 'required|integer',
            'flag_lokasi' => 'required|string|max:45',
            'flag_pindah' => 'required|string|max:45',
        ]);

        MutasiLokasi::create($validatedData);
        return redirect()->route('admin.mutasi_lokasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(MutasiLokasi $mutasiLokasi)
    {
        $lokasis = Lokasi::all();
        $pengadaans = Pengadaan::all();
        return view('admin.mutasi_lokasi.edit', compact('mutasiLokasi', 'lokasis', 'pengadaans'));
    }

    public function update(Request $request, MutasiLokasi $mutasiLokasi)
    {
        $validatedData = $request->validate([
            'id_lokasi' => 'required|integer',
            'id_pengadaan' => 'required|integer', 
            'flag_lokasi' => 'required|string|max:45',
            'flag_pindah' => 'required|string|max:45',
        ]);

        $mutasiLokasi->update($validatedData);
        return redirect()->route('admin.mutasi_lokasi.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(MutasiLokasi $mutasiLokasi)
    {
        $mutasiLokasi->delete();
        return redirect()->route('admin.mutasi_lokasi.index')->with('success', 'Data berhasil dihapus');
    }
}