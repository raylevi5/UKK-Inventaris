<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
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
            margin-left: 250px;
            padding: 20px;
        }
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
        <h1>Data Barang</h1>
        <a href="{{ route('admin.master_barang.create') }}" class="add-item-link">Tambah Barang</a>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <table>
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi Teknis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                        <tr>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->spesifikasi_teknis }}</td>
                            <td>
                                <a href="{{ route('admin.master_barang.edit', $item->id_barang) }}">Edit</a>
                                <form action="{{ route('admin.master_barang.destroy', $item->id_barang) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>