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

            h1 {
                margin-top: 20px;
            }

            footer {
                background-color: #f8f9fa;
                padding: 1rem;
                position: fixed;
                bottom: 0;
                width: 100%;
                box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
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

            article {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin: 30px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    article p {
        margin: 10px 0;
        color: #495057;
        line-height: 1.6;
    }

    article p:first-child {
        font-size: 18px;
        color: #343a40;
        font-weight: 500;
    }

    article p:last-child {
        font-size: 20px;
        color: #0d6efd;
        font-weight: bold;
    }
        </style>
    </head>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
                <h4>Agent Inventaris</h4>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
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
                <h1>Dashboard</h1>
                
                <div class="row mt-4">
                    <!-- Master Barang Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Master Barang</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMasterBarang }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-box fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add more cards for other data -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Distributor</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDistributor }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-truck fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Continue adding cards for all other data types -->
                    <!-- Kategori Asset -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Kategori Asset</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKategoriAsset }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tags fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sub Kategori Asset -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Sub Kategori</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSubKategoriAsset }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tag fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Merk -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Merk</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMerk }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-copyright fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Satuan -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Satuan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSatuan }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Depresiasi -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Depresiasi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDepresiasi }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pengadaan -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pengadaan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPengadaan }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Lokasi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLokasi }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-map fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mutasi Lokasi -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Mutasi Lokasi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMutasiLokasi }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Opname -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Opname</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOpname }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hitung Depresiasi -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Hitung Depresiasi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalHitungDepresiasi }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calculator fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <article>
                    <p>selalu update</p>
                    <p>untuk info lebih lanjut bisa hubungi nomor di bawah ini</p>
                    <p>08123456789</p>
                </article>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <span>&copy; 2025 Admin Dashboard</span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>