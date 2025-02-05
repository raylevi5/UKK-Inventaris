<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengadaan</title>
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
        input[type="text"], input[type="date"], input[type="number"], select {
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
    <h1>Tambah Pengadaan</h1>

    <div class="form-container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.pengadaan.store') }}" method="POST">
            @csrf

            <label for="id_master_barang">Master Barang</label>
            <select name="id_master_barang" id="id_master_barang" class="form-control @error('id_master_barang') is-invalid @enderror" required>
                <option value="">Pilih Master Barang</option>
                @foreach($masterBarangs as $mb)  
                    <option value="{{ $mb->id_barang }}">{{ $mb->nama_barang }}</option>
                @endforeach
            </select>
            @error('id_master_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="id_depresiasi">Depresiasi</label>
            <select name="id_depresiasi" id="id_depresiasi" class="form-control @error('id_depresiasi') is-invalid @enderror" required>
                <option value="">Pilih Depresiasi</option>
                @foreach($depresiasis as $d)
                    <option value="{{ $d->id_depresiasi }}">{{ $d->lama_depresiasi }}</option>
                @endforeach
            </select>
            @error('id_depresiasi')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="id_merk">Merk</label>
            <select name="id_merk" id="id_merk" class="form-control @error('id_merk') is-invalid @enderror" required>
                <option value="">Pilih Merk</option>
                @foreach($merks as $m)
                    <option value="{{ $m->id_merk }}">{{ $m->merk }}</option>
                @endforeach
            </select>
            @error('id_merk')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="id_satuan">Satuan</label>
            <select name="id_satuan" id="id_satuan" class="form-control @error('id_satuan') is-invalid @enderror" required>
                <option value="">Pilih Satuan</option>
                @foreach($satuans as $s)
                    <option value="{{ $s->id_satuan }}">{{ $s->satuan }}</option>
                @endforeach
            </select>
            @error('id_satuan')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="id_sub_kategori_asset">Sub Kategori Asset</label>
            <select name="id_sub_kategori_asset" id="id_sub_kategori_asset" class="form-control @error('id_sub_kategori_asset') is-invalid @enderror" required>
                <option value="">Pilih Sub Kategori Asset</option>
                @foreach($subKategoriAssets as $ska)
                    <option value="{{ $ska->id_sub_kategori_asset }}">{{ $ska->sub_kategori_asset }}</option>
                @endforeach
            </select>
            @error('id_sub_kategori_asset')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="id_distributor">Distributor</label>
            <select name="id_distributor" id="id_distributor" class="form-control @error('id_distributor') is-invalid @enderror" required>
                <option value="">Pilih Distributor</option>
                @foreach($distributors as $d)
                    <option value="{{ $d->id_distributor }}">{{ $d->nama_distributor }}</option>
                @endforeach
            </select>
            @error('id_distributor')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="kode_pengadaan">Kode Pengadaan</label>
            <input type="text" name="kode_pengadaan" id="kode_pengadaan" class="form-control @error('kode_pengadaan') is-invalid @enderror" required>
            @error('kode_pengadaan')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="no_invoice">No Invoice</label>
            <input type="text" name="no_invoice" id="no_invoice" class="form-control @error('no_invoice') is-invalid @enderror" required>
            @error('no_invoice')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="no_seri_barang">No Seri Barang</label>
            <input type="text" name="no_seri_barang" id="no_seri_barang" class="form-control @error('no_seri_barang') is-invalid @enderror" required>
            @error('no_seri_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="tahun_produksi">Tahun Produksi</label>
            <input type="text" name="tahun_produksi" id="tahun_produksi" class="form-control @error('tahun_produksi') is-invalid @enderror" required>
            @error('tahun_produksi')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="tgl_pengadaan">Tanggal Pengadaan</label>
            <input type="date" name="tgl_pengadaan" id="tgl_pengadaan" class="form-control @error('tgl_pengadaan') is-invalid @enderror" required>
            @error('tgl_pengadaan')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="harga_barang">Harga Barang</label>
            <input type="number" name="harga_barang" id="harga_barang" class="form-control @error('harga_barang') is-invalid @enderror" required>
            @error('harga_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="nilai_barang">Nilai Barang</label>
            <input type="number" name="nilai_barang" id="nilai_barang" class="form-control @error('nilai_barang') is-invalid @enderror" required>
            @error('nilai_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="fb">FB</label>
            <select name="fb" id="fb" class="form-control @error('fb') is-invalid @enderror" required>
                <option value="">Pilih FB</option>
                <option value="0">0</option>
                <option value="1">1</option>
            </select>
            @error('fb')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required>
            @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror

            <div class="form-actions">
                <button type="submit">Simpan</button>
                <button type="button"><a href="{{ route('admin.pengadaan.index') }}">Kembali</a></button>
            </div>
        </form>
    </div>
</body>
</html>
