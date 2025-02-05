<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    public function index()
    {
        $opnames = Opname::with('pengadaan')->get();
        return view('admin.opname.index', compact('opnames'));
    }

    public function create()
    {
        $pengadaans = Pengadaan::all();
        return view('admin.opname.create', compact('pengadaans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengadaan' => 'required|integer',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'required|string|max:100',
        ]);

        Opname::create($validatedData);
        return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil ditambahkan');
    }

    public function edit(Opname $opname)
    {
        $pengadaans = Pengadaan::all();
        return view('admin.opname.edit', compact('opname', 'pengadaans'));
    }

    public function update(Request $request, Opname $opname)
    {
        $validatedData = $request->validate([
            'id_pengadaan' => 'required|integer',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'required|string|max:100',
        ]);

        $opname->update($validatedData);
        return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil diupdate');
    }

    public function destroy(Opname $opname)
    {
        $opname->delete();
        return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil dihapus');
    }
}