<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $barang = MasterBarang::all();
        return view('admin.master_barang.index', compact('barang'));
    }

    // Menampilkan form untuk membuat data baru
    public function create()
    {
        return view('admin.master_barang.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|max:20',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'required|max:100',
        ]);

        MasterBarang::create($validatedData);

        return redirect()->route('admin.master_barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    // Menampilkan detail data barang
    public function show($id)
    {
        $barang = MasterBarang::findOrFail($id);
        return view('admin.master_barang.show', compact('barang'));
    }

    // Menampilkan form untuk mengedit data barang
    public function edit($id)
    {
        $barang = MasterBarang::findOrFail($id);
        return view('admin.master_barang.edit', compact('barang'));
    }

    // Mengupdate data barang
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|max:20',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'required|max:100',
        ]);

        $barang = MasterBarang::findOrFail($id);
        $barang->update($validatedData);

        return redirect()->route('admin.master_barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    // Menghapus data barang
    public function destroy($id)
{
    $barang = MasterBarang::findOrFail($id);

    // Cek apakah ada data terkait di Pengadaan
    if ($barang->pengadaans()->exists()) {
        return redirect()->route('admin.master_barang.index')->with('error', 'Barang tidak bisa dihapus karena masih ada data terkait di Pengadaan.');
    }

    $barang->delete();
    return redirect()->route('admin.master_barang.index')->with('success', 'Barang berhasil dihapus');
}
}
