<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengadaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color:rgb(0, 53, 105);
            color: white;
            padding: 15px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .main-content {
            margin-left: 250px; /* Width of the sidebar */
            padding: 20px;
            overflow-x: auto; /* Menghindari tabel keluar dari batas */
        }
        /* Styling the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        table td a {
            color: #007bff;
            text-decoration: none;
        }
        table td a:hover {
            text-decoration: underline;
        }
        button {
            padding: 6px 12px;
            background-color: #dc3545;
            border: none;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #c82333;
        }
        .add-item-link {
            margin: 15px 0;
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-item-link:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Admin Inventaris</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.master_barang.index') }}" class="nav-link">Master Barang</a></li>
            <li class="nav-item"><a href="{{ route('admin.distributor.index') }}" class="nav-link">Distributor</a></li>
            <li class="nav-item"><a href="{{ route('admin.kategori_asset.index') }}" class="nav-link">Kategori Asset</a></li>
            <li class="nav-item"><a href="{{ route('admin.sub_kategori_asset.index') }}" class="nav-link">Sub Kategori Asset</a></li>
            <li class="nav-item"><a href="{{ route('admin.merk.index') }}" class="nav-link">Merk</a></li>
            <li class="nav-item"><a href="{{ route('admin.satuan.index') }}" class="nav-link">Satuan</a></li>
            <li class="nav-item"><a href="{{ route('admin.depresiasi.index') }}" class="nav-link">Depresiasi</a></li>
            <li class="nav-item"><a href="{{ route('admin.pengadaan.index') }}" class="nav-link">Pengadaan</a></li>
            <li class="nav-item"><a href="{{ route('admin.lokasi.index') }}" class="nav-link">Lokasi</a></li>
            <li class="nav-item"><a href="{{ route('admin.mutasi_lokasi.index') }}" class="nav-link">Mutasi Lokasi</a></li>
            <li class="nav-item"><a href="{{ route('admin.opname.index') }}" class="nav-link">Opname</a></li>
            <li class="nav-item"><a href="{{ route('admin.hitung_depresiasi.index') }}" class="nav-link">Hitung Depresiasi</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Data Pengadaan</h1>
        <a href="{{ route('admin.pengadaan.create') }}" class="add-item-link">Tambah Pengadaan</a>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Master Barang</th>
                    <th>Depresiasi</th>
                    <th>Merk</th>
                    <th>Satuan</th>
                    <th>Sub Kategori Asset</th>
                    <th>Distributor</th>
                    <th>Kode Pengadaan</th>
                    <th>No Invoice</th>
                    <th>No Seri</th>
                    <th>Tahun Produksi</th>
                    <th>Tanggal Pengadaan</th>
                    <th>Harga Barang</th>
                    <th>Nilai Barang</th>
                    <th>Nilai Depresiasi</th>
                    <th>FB</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengadaans as $pengadaan)
                    <tr>
                        <td>{{ $pengadaan->masterBarang->nama_barang }}</td>
                        <td>{{ $pengadaan->depresiasi->lama_depresiasi }}</td>
                        <td>{{ $pengadaan->merk->merk }}</td>
                        <td>{{ $pengadaan->satuan->satuan }}</td>
                        <td>{{ $pengadaan->subKategoriAsset->sub_kategori_asset }}</td>
                        <td>{{ $pengadaan->distributor->nama_distributor }}</td>
                        <td>{{ $pengadaan->kode_pengadaan }}</td>
                        <td>{{ $pengadaan->no_invoice }}</td>
                        <td>{{ $pengadaan->no_seri_barang }}</td>
                        <td>{{ $pengadaan->tahun_produksi }}</td>
                        <td>{{ $pengadaan->tgl_pengadaan }}</td>
                        <td>Rp {{ $pengadaan->harga_barang }}</td>
                        <td>Rp {{ $pengadaan->nilai_barang }}</td>
                        <td>Rp {{ number_format($pengadaan->harga_barang / $pengadaan->depresiasi->lama_depresiasi, 2) }}</td>
                        <td>{{ $pengadaan->fb }}</td>
                        <td>{{ $pengadaan->keterangan }}</td>
                        <td>
                            <a href="{{ route('admin.pengadaan.edit', $pengadaan->id_pengadaan) }}">Edit</a>
                            <a href="{{ route('admin.pengadaan.detail', $pengadaan->id_pengadaan) }}">Detail</a>
                            <form action="{{ route('admin.pengadaan.destroy', $pengadaan->id_pengadaan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
