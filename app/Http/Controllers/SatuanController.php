<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::all();
        return view('admin.satuan.index', compact('satuans'));
    }

    public function create()
    {
        return view('admin.satuan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'satuan' => 'required|string|max:20',
        ]);

        Satuan::create($validatedData);
        return redirect()->route('admin.satuan.index')->with('success', 'Satuan created successfully.');
    }

    public function edit(Satuan $satuan)
    {
        return view('admin.satuan.edit', compact('satuan'));
    }

    public function update(Request $request, Satuan $satuan)
    {
        $validatedData = $request->validate([
            'satuan' => 'required|string|max:20',
        ]);

        $satuan->update($validatedData);
        return redirect()->route('admin.satuan.index')->with('success', 'Satuan updated successfully.');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('admin.satuan.index')->with('success', 'Satuan deleted successfully.');
    }
}