<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $merks = Merk::all();
        return view('admin.merk.index', compact('merks'));
    }

    public function create()
    {
        return view('admin.merk.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'merk' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:50',
        ]);

        Merk::create($validatedData);
        return redirect()->route('admin.merk.index')->with('success', 'Merk created successfully.');
    }

    public function edit(Merk $merk)
    {
        return view('admin.merk.edit', compact('merk'));
    }

    public function update(Request $request, Merk $merk)
    {
        $validatedData = $request->validate([
            'merk' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:50',
        ]);

        $merk->update($validatedData);
        return redirect()->route('admin.merk.index')->with('success', 'Merk updated successfully.');
    }

    public function destroy(Merk $merk)
    {
        $merk->delete();
        return redirect()->route('admin.merk.index')->with('success', 'Merk deleted successfully.');
    }
}