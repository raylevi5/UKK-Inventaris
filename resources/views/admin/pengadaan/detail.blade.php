<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengadaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Detail Pengadaan</h4>
        </div>
        <div class="card-body">
            <div class="mb-4 row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Kode Pengadaan</th>
                            <td>: {{ $pengadaan->kode_pengadaan }}</td>
                        </tr>
                        <tr>
                            <th>Master Barang</th>
                            <td>: {{ $pengadaan->masterBarang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Depresiasi</th>
                            <td>: {{ $pengadaan->depresiasi->lama_depresiasi }} bulan</td>
                        </tr>
                        <tr>
                            <th>Merk</th>
                            <td>: {{ $pengadaan->merk->merk }}</td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td>: {{ $pengadaan->satuan->satuan }}</td>
                        </tr>
                        <tr>
                            <th>Sub Kategori Asset</th>
                            <td>: {{ $pengadaan->subKategoriAsset->sub_kategori_asset }}</td>
                        </tr>
                        <tr>
                            <th>Distributor</th>
                            <td>: {{ $pengadaan->distributor->nama_distributor }}</td>
                        </tr>
                        <tr>
                            <th>No Invoice</th>
                            <td>: {{ $pengadaan->no_invoice }}</td>
                        </tr>
                        <tr>
                            <th>No Seri Barang</th>
                            <td>: {{ $pengadaan->no_seri_barang }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Produksi</th>
                            <td>: {{ $pengadaan->tahun_produksi }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengadaan</th>
                            <td>: {{ $pengadaan->tgl_pengadaan }}</td>
                        </tr>
                        <tr>
                            <th>Harga Barang</th>
                            <td>: Rp {{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Barang</th>
                            <td>: Rp {{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Depresiasi per Bulan</th>
                            <td>: Rp {{ number_format($pengadaan->nilai_barang / $pengadaan->depresiasi->lama_depresiasi, 2) }}</td>
                        </tr>
                        <tr>
                            <th>FB</th>
                            <td>: {{ $pengadaan->fb }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $pengadaan->keterangan }}</td>
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
                        $nilaiPenyusutanPerBulan = $pengadaan->nilai_barang / $pengadaan->depresiasi->lama_depresiasi;
                        $nilaiSisa = $pengadaan->nilai_barang;
                        $durasi = $pengadaan->depresiasi->lama_depresiasi;
                        @endphp

                        <tr>
                            <td>1</td>
                            <td>Rp {{ number_format($nilaiSisa, 0, ',', '.') }}</td>
                        </tr>

                        @for ($i = 2; $i <= $durasi; $i++)
                            @php
                            $nilaiSisa -= $nilaiPenyusutanPerBulan;
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
                <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>