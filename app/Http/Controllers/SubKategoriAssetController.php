<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    public function index()
    {
        $subKategoriAssets = SubKategoriAsset::with('kategoriAsset')->get();
        return view('admin.sub_kategori_asset.index', compact('subKategoriAssets'));
    }

    public function create()
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub_kategori_asset.create', compact('kategoriAssets'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori_asset' => 'required|integer',
            'kode_sub_kategori_asset' => 'required|string|max:20',
            'sub_kategori_asset' => 'required|string|max:25',
        ]);

        SubKategoriAsset::create($validatedData);
        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset created successfully.');
    }

    public function edit(SubKategoriAsset $subKategoriAsset)
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub_kategori_asset.edit', compact('subKategoriAsset', 'kategoriAssets'));
    }

    public function update(Request $request, SubKategoriAsset $subKategoriAsset)
    {
        $validatedData = $request->validate([
            'id_kategori_asset' => 'required|integer',
            'kode_sub_kategori_asset' => 'required|string|max:20',
            'sub_kategori_asset' => 'required|string|max:25',
        ]);

        $subKategoriAsset->update($validatedData);
        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset updated successfully.');
    }

    public function destroy(SubKategoriAsset $subKategoriAsset)
    {
        $subKategoriAsset->delete();
        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset deleted successfully.');
    }
}