<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Distributor</title>
</head>
<body>

<h1>Detail Distributor</h1>

<p>Nama Distributor: {{ $distributor->nama_distributor }}</p>
<p>Alamat: {{ $distributor->alamat }}</p>
<p>No Telepon: {{ $distributor->no_telp }}</p>
<p>Email: {{ $distributor->email }}</p>
<p>Keterangan: {{ $distributor->keterangan }}</p>

<a href="{{ route('admin.distributor.index') }}">Kembali</a>

</body>
</html>