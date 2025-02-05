<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('admin.lokasi.index', compact('lokasis'));
    }

    public function create()
    {
        return view('admin.lokasi.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_lokasi' => 'required|string|max:20',
            'nama_lokasi' => 'required|string|max:200',
            'keterangan' => 'nullable|string|max:50',
        ]);

        Lokasi::create($validatedData);
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi created successfully.');
    }

    public function edit(Lokasi $lokasi)
    {
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $validatedData = $request->validate([
            'kode_lokasi' => 'required|string|max:20',
            'nama_lokasi' => 'required|string|max:200',
            'keterangan' => 'nullable|string|max:50',
        ]);

        $lokasi->update($validatedData);
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi updated successfully.');
    }

    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi deleted successfully.');
    }
}