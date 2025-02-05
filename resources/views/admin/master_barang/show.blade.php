<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
</head>
<body>

<h1>Detail Barang</h1>

<p>Kode Barang: {{ $barang->kode_barang }}</p>
<p>Nama Barang: {{ $barang->nama_barang }}</p>
<p>Spesifikasi Teknis: {{ $barang->spesifikasi_teknis }}</p>

<a href="{{ route('admin.master_barang.index') }}">Kembali</a>

</body>
</html>
