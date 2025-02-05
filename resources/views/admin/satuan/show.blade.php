<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Satuan</title>
</head>
<body>

<h1>Detail Satuan</h1>

<p>Satuan: {{ $satuan->satuan }}</p>

<a href="{{ route('admin.satuan.index') }}">Kembali</a>

</body>
</html>