<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sub Kategori Asset</title>
</head>
<body>

<h1>Detail Sub Kategori Asset</h1>

<p>Kategori Asset: {{ $subKategoriAsset->kategoriAsset->kategori_asset }}</p>
<p>Kode Sub Kategori Asset: {{ $subKategoriAsset->kode_sub_kategori_asset }}</p>
<p>Sub Kategori Asset: {{ $subKategoriAsset->sub_kategori_asset }}</p>

<a href="{{ route('admin.sub_kategori_asset.index') }}">Kembali</a>

</body>
</html>