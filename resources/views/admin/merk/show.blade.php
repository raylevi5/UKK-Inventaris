<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Merk</title>
</head>
<body>

<h1>Detail Merk</h1>

<p>Merk: {{ $merk->merk }}</p>
<p>Keterangan: {{ $merk->keterangan }}</p>

<a href="{{ route('admin.merk.index') }}">Kembali</a>

</body>
</html>