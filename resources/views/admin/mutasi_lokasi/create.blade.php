<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mutasi Lokasi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        button[type="button"] a {
            text-decoration: none;
            color: white;
        }
        button[type="button"] {
            background-color: #6c757d;
        }
        button[type="button"]:hover {
            background-color: #5a6268;
        }
        @media (max-width: 600px) {
            .form-container {
                padding: 15px;
                width: 90%;
            }
            h1 { font-size: 1.5rem; }
            button {
                width: 48%;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Tambah Mutasi Lokasi</h1>

    <div class="form-container">
        <form action="{{ route('admin.mutasi_lokasi.store') }}" method="POST">
            @csrf
            <label for="id_lokasi">Lokasi</label>
            <select name="id_lokasi" id="id_lokasi" required>
                @foreach ($lokasis as $lokasi)
                    <option value="{{ $lokasi->id_lokasi }}">{{ $lokasi->nama_lokasi }}</option>
                @endforeach
            </select>

            <label for="id_pengadaan">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" required>
                @foreach ($pengadaans as $pengadaan)
                    <option value="{{ $pengadaan->id_pengadaan }}">{{ $pengadaan->masterBarang->nama_barang }}</option>
                @endforeach
            </select>

            <label for="flag_lokasi">Flag Lokasi</label>
            <input type="text" name="flag_lokasi" id="flag_lokasi" required>

            <label for="flag_pindah">Flag Pindah</label>
            <input type="text" name="flag_pindah" id="flag_pindah" required>

            <div class="form-actions">
                <button type="submit">Simpan</button>
                <button type="button"><a href="{{ route('admin.mutasi_lokasi.index') }}">Kembali</a></button>
            </div>
        </form>
    </div>
</body>
</html>