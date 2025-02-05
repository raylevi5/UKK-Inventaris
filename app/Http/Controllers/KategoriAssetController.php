<?php

namespace App\Http\Controllers;

use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class KategoriAssetController extends Controller
{
    public function index()
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.kategori_asset.index', compact('kategoriAssets'));
    }

    public function create()
    {
        return view('admin.kategori_asset.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kategori_asset' => 'required|string|max:20',
            'kategori_asset' => 'required|string|max:25',
        ]);

        KategoriAsset::create($validatedData);
        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori Asset created successfully.');
    }

    public function edit(KategoriAsset $kategoriAsset)
    {
        return view('admin.kategori_asset.edit', compact('kategoriAsset'));
    }

    public function update(Request $request, KategoriAsset $kategoriAsset)
    {
        $validatedData = $request->validate([
            'kode_kategori_asset' => 'required|string|max:20',
            'kategori_asset' => 'required|string|max:25',
        ]);

        $kategoriAsset->update($validatedData);
        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori Asset updated successfully.');
    }

    public function destroy(KategoriAsset $kategoriAsset)
    {
        $kategoriAsset->delete();
        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori Asset deleted successfully.');
    }
}