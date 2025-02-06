<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistributorRequest;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        return view('admin.distributor.index', compact('distributors'));
    }

    public function create()
    {
        return view('admin.distributor.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_distributor' => 'required|string|max:50',
        'alamat' => 'required|string|max:50',
        'no_telp' => 'required|string|max:15',
        'email' => 'required|string|email|max:30',
        'keterangan' => 'nullable|string|max:45',
    ]);

    try {
        Distributor::create($validatedData);
        return redirect()
            ->route('admin.distributor.index')
            ->with('success', 'Distributor created successfully.');
    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Failed to create distributor: ' . $e->getMessage());
    }
}

    public function edit(Distributor $distributor)
    {
        return view('admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, Distributor $distributor)
{
    $validatedData = $request->validate([
        'nama_distributor' => 'required|string|max:50',
        'alamat' => 'required|string|max:50',
        'no_telp' => 'required|string|max:15',
        'email' => 'required|string|email|max:30',
        'keterangan' => 'nullable|string|max:45',
    ]);

    $distributor->update($validatedData);
    return redirect()->route('admin.distributor.index')->with('success', 'Distributor updated successfully.');
}

public function destroy(Distributor $distributor)
{
    // Cek apakah ada data terkait di Pengadaan
    if ($distributor->pengadaans()->exists()) {
        return redirect()->route('admin.distributor.index')->with('error', 'Distributor tidak bisa dihapus karena masih ada data terkait di Pengadaan.');
    }

    $distributor->delete();
    return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil dihapus.');
}
}