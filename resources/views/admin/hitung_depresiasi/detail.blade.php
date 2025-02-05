<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hitung Depresiasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Detail Hitung Depresiasi</h4>
        </div>
        <div class="card-body">
            <div class="mb-4 row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Kode Pengadaan</th>
                            <td>: {{ $hitungDepresiasi->pengadaan->kode_pengadaan }}</td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td>: {{ $hitungDepresiasi->pengadaan->masterBarang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Hitung</th>
                            <td>: {{ $hitungDepresiasi->tgl_hitung_depresiasi }}</td>
                        </tr>
                        <tr>
                            <th>Harga Perolehan</th>
                            <td>: Rp {{ number_format($hitungDepresiasi->nilai_barang, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Lama Depresiasi</th>
                            <td>: {{ $hitungDepresiasi->durasi }} bulan</td>
                        </tr>
                        <tr>
                            <th>Nilai Depresiasi per Bulan</th>
                            <td>: Rp {{ number_format($hitungDepresiasi->nilai_barang / $hitungDepresiasi->durasi, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bulan ke-</th>
                <th>Nilai Barang</th>
            </tr>
        </thead>
        <tbody>
        @php
        $hargaPerolehan = $hitungDepresiasi->nilai_barang;
        $lamaDepresiasi = $hitungDepresiasi->durasi;
        $nilaiPenyusutanPerBulan = $hargaPerolehan / $lamaDepresiasi;
        $nilaiSisa = $hargaPerolehan - $nilaiPenyusutanPerBulan;
        @endphp

        <tr>
            <td>1</td>
            <td>Rp {{ number_format($nilaiSisa, 0, ',', '.') }}</td>
        </tr>

        @for ($i = 2; $i <= $lamaDepresiasi; $i++)
            @php
            if ($i == $lamaDepresiasi) {
                $nilaiSisa = 0;
            } else {
                $nilaiSisa -= $nilaiPenyusutanPerBulan;
            }
            @endphp
            <tr>
                <td>{{ $i }}</td>
                <td>Rp {{ number_format(max(0, $nilaiSisa), 0, ',', '.') }}</td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>

            <div class="mt-3">
                <a href="{{ route('admin.hitung_depresiasi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>