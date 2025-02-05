<?php

namespace App\Http\Controllers;

use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index()
    {
        $depresiasis = Depresiasi::all();
        return view('admin.depresiasi.index', compact('depresiasis'));
    }

    public function create()
    {
        return view('admin.depresiasi.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|string|max:50',
        ]);

        Depresiasi::create($validatedData);
        return redirect()->route('admin.depresiasi.index')->with('success', 'Depresiasi created successfully.');
    }

    public function edit(Depresiasi $depresiasi)
    {
        return view('admin.depresiasi.edit', compact('depresiasi'));
    }

    public function update(Request $request, Depresiasi $depresiasi)
    {
        $validatedData = $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|string|max:50',
        ]);

        $depresiasi->update($validatedData);
        return redirect()->route('admin.depresiasi.index')->with('success', 'Depresiasi updated successfully.');
    }

    public function destroy(Depresiasi $depresiasi)
    {
        $depresiasi->delete();
        return redirect()->route('admin.depresiasi.index')->with('success', 'Depresiasi deleted successfully.');
    }
}