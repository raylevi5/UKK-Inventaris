<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lokasi</title>
</head>
<body>

<h1>Detail Lokasi</h1>

<p>Kode Lokasi: {{ $lokasi->kode_lokasi }}</p>
<p>Nama Lokasi: {{ $lokasi->nama_lokasi }}</p>
<p>Keterangan: {{ $lokasi->keterangan }}</p>

<a href="{{ route('admin.lokasi.index') }}">Kembali</a>

</body>
</html>