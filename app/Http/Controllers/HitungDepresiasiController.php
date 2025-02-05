<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    public function index()
    {
        $hitungDepresiasis = HitungDepresiasi::with('pengadaan')->get();
        $hitungDepresiasis->each(function($depresiasi) {
            $depresiasi->perhitungan = $depresiasi->hitungSisaDepresiasi();
        });
        return view('admin.hitung_depresiasi.index', compact('hitungDepresiasis'));
    }

    public function create()
    {
        $pengadaans = Pengadaan::all();
        return view('admin.hitung_depresiasi.create', compact('pengadaans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengadaan' => 'required|integer',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1', // Prevent zero or negative duration
            'nilai_barang' => 'required|integer|min:1' // Prevent zero or negative value
        ]);

        HitungDepresiasi::create($validatedData);
        return redirect()->route('admin.hitung_depresiasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(HitungDepresiasi $hitungDepresiasi)
    {
        $pengadaans = Pengadaan::all();
        return view('admin.hitung_depresiasi.edit', compact('hitungDepresiasi', 'pengadaans'));
    }

    public function update(Request $request, HitungDepresiasi $hitungDepresiasi)
    {
        $validatedData = $request->validate([
            'id_pengadaan' => 'required|integer',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1', // Prevent zero or negative duration
            'nilai_barang' => 'required|integer|min:1' // Prevent zero or negative value
        ]);

        $hitungDepresiasi->update($validatedData);
        return redirect()->route('admin.hitung_depresiasi.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(HitungDepresiasi $hitungDepresiasi)
    {
        $hitungDepresiasi->delete();
        return redirect()->route('admin.hitung_depresiasi.index')->with('success', 'Data berhasil dihapus');
    }

    public function detail(HitungDepresiasi $hitungDepresiasi)
    {
        $hitungDepresiasi->perhitungan = $hitungDepresiasi->hitungSisaDepresiasi();
        return view('admin.hitung_depresiasi.detail', compact('hitungDepresiasi'));
    }
}