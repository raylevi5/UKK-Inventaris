<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color:rgb(0, 53, 105);
            color: white;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .container {
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
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4>Agent Inventaris</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('agent.dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('agent.master_barang') }}" class="nav-link">Master Barang</a></li>
                <li class="nav-item"><a href="{{ route('agent.distributor') }}" class="nav-link">Distributor</a></li>
                <li class="nav-item"><a href="{{ route('agent.kategori_asset') }}" class="nav-link">Kategori Asset</a></li>
                <li class="nav-item"><a href="{{ route('agent.sub_kategori_asset') }}" class="nav-link">Sub Kategori Asset</a></li>
                <li class="nav-item"><a href="{{ route('agent.merk') }}" class="nav-link">Merk</a></li>
                <li class="nav-item"><a href="{{ route('agent.satuan') }}" class="nav-link">Satuan</a></li>
                <li class="nav-item"><a href="{{ route('agent.depresiasi') }}" class="nav-link">Depresiasi</a></li>
                <li class="nav-item"><a href="{{ route('agent.pengadaan') }}" class="nav-link">Pengadaan</a></li>
                <li class="nav-item"><a href="{{ route('agent.lokasi') }}" class="nav-link">Lokasi</a></li>
                <li class="nav-item"><a href="{{ route('agent.mutasi_lokasi') }}" class="nav-link">Mutasi Lokasi</a></li>
                <li class="nav-item"><a href="{{ route('agent.opname') }}" class="nav-link">Opname</a></li>
                <li class="nav-item"><a href="{{ route('agent.hitung_depresiasi') }}" class="nav-link">Hitung Depresiasi</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="container p-4">
            <h1>Data Lokasi</h1>

            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>Kode Lokasi</th>
                        <th>Nama Lokasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasis as $lokasi)
                        <tr>
                            <td>{{ $lokasi->kode_lokasi }}</td>
                            <td>{{ $lokasi->nama_lokasi }}</td>
                            <td>{{ $lokasi->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add JavaScript if needed
    </script>
</body>
</html>
