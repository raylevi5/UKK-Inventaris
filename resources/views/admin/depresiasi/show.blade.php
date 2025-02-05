<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Depresiasi</title>
</head>
<body>

<h1>Detail Depresiasi</h1>

<p>Lama Depresiasi: {{ $depresiasi->lama_depresiasi }}</p>
<p>Keterangan: {{ $depresiasi->keterangan }}</p>

<a href="{{ route('admin.depresiasi.index') }}">Kembali</a>

</body>
</html>