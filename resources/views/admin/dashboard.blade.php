<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: scale(1.05);
            transition: 0.3s;
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
        footer {
    background-color: #f8f9fa;
    padding: 1rem;
    box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000; /* Pastikan footer berada di atas konten lainnya */
}
          /* Main Content Styling */
.container-fluid {
    margin-left: 250px; /* Menyesuaikan dengan lebar sidebar */
    padding: 20px;
    max-width: calc(100% - 250px); /* Menyesuaikan ukuran konten dengan sidebar */
    margin-top: 20px;
}

/* Heading (Title) */
h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #343a40;
}

/* Card Container */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* Card Styling */
.card {
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    margin-bottom: 20px;
    padding: 15px;
    height: 100%; /* Make sure the card takes full height */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Card Hover Effect */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Card Title */
.card h3 {
    margin-top: 0;
    color: #007bff;
    font-size: 1.5rem;
}

/* Card Description */
.card p {
    margin: 10px 0;
    color: #6c757d;
    font-size: 14px;
}

/* Button */
.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    transition: background-color 0.3s ease;
    border: none;
}

/* Button Hover Effect */
.btn-primary:hover {
    background-color: #0056b3;
}

/* Responsiveness for Cards */
.col-md-4 {
    flex: 0 0 calc(33.333% - 20px);
    max-width: calc(33.333% - 20px);
}

@media (max-width: 768px) {
    .col-md-4 {
        flex: 0 0 calc(50% - 20px);
        max-width: calc(50% - 20px);
    }
}

@media (max-width: 576px) {
    .col-md-4 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
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

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <h1>Dashboard</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Master Barang</h3>
                        <p>Menambah, mengubah, dan menghapus data master barang.</p>
                        <a href="{{ route('admin.master_barang.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Distributor</h3>
                        <p>Menambah, mengubah, dan menghapus data distributor.</p>
                        <a href="{{ route('admin.distributor.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Kategori Asset</h3>
                        <p>Menambah, mengubah, dan menghapus data kategori asset.</p>
                        <a href="{{ route('admin.kategori_asset.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Sub Kategori Asset</h3>
                        <p>Menambah, mengubah, dan menghapus data sub kategori asset.</p>
                        <a href="{{ route('admin.sub_kategori_asset.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Merk</h3>
                        <p>Menambah, mengubah, dan menghapus data merk.</p>
                        <a href="{{ route('admin.merk.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Satuan</h3>
                        <p>Menambah, mengubah, dan menghapus data satuan.</p>
                        <a href="{{ route('admin.satuan.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Depresiasi</h3>
                        <p>Menambah, mengubah, dan menghapus data depresiasi.</p>
                        <a href="{{ route('admin.depresiasi.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Pengadaan</h3>
                        <p>Menambah, mengubah, dan menghapus data pengadaan.</p>
                        <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Lokasi</h3>
                        <p>Menambah, mengubah, dan menghapus data lokasi.</p>
                        <a href="{{ route('admin.lokasi.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Mutasi Lokasi</h3>
                        <p>Menambah, mengubah, dan menghapus data mutasi lokasi.</p>
                        <a href="{{ route('admin.mutasi_lokasi.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Opname</h3>
                        <p>Menambah, mengubah, dan menghapus data opname.</p>
                        <a href="{{ route('admin.opname.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h3>Hitung Depresiasi</h3>
                        <p>Menambah, mengubah, dan menghapus data hitung depresiasi.</p>
                        <a href="{{ route('admin.hitung_depresiasi.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="d-flex justify-content-between align-items-center">
        <span>&copy; 2025 Admin Dashboard</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
