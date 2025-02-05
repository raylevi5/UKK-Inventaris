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
            max-width: 800px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
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

        <h1>Tambah Pengadaan</h1>
        
        <form action="{{ route('admin.pengadaan.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Master Barang</label>
                <select name="id_master_barang" class="form-control @error('id_master_barang') is-invalid @enderror">
                    <option value="">Pilih Master Barang</option>
                    @foreach($masterBarangs as $mb)  
                        <option value="{{ $mb->id_barang }}">{{ $mb->nama_barang }}</option>
                    @endforeach
                </select>
                @error('id_master_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Depresiasi</label>
                <select name="id_depresiasi" class="form-control @error('id_depresiasi') is-invalid @enderror">
                    <option value="">Pilih Depresiasi</option>
                    @foreach($depresiasis as $d)
                        <option value="{{ $d->id_depresiasi }}">{{ $d->lama_depresiasi }}</option>
                    @endforeach
                </select>
                @error('id_depresiasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Merk</label>
                <select name="id_merk" class="form-control @error('id_merk') is-invalid @enderror">
                    <option value="">Pilih Merk</option>
                    @foreach($merks as $m)
                        <option value="{{ $m->id_merk }}">{{ $m->merk }}</option>
                    @endforeach
                </select>
                @error('id_merk')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <select name="id_satuan" class="form-control @error('id_satuan') is-invalid @enderror">
                    <option value="">Pilih Satuan</option>
                    @foreach($satuans as $s)
                        <option value="{{ $s->id_satuan }}">{{ $s->satuan }}</option>
                    @endforeach
                </select>
                @error('id_satuan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Sub Kategori Asset</label>
                <select name="id_sub_kategori_asset" class="form-control @error('id_sub_kategori_asset') is-invalid @enderror">
                    <option value="">Pilih Sub Kategori Asset</option>
                    @foreach($subKategoriAssets as $ska)
                        <option value="{{ $ska->id_sub_kategori_asset }}">{{ $ska->sub_kategori_asset }}</option>
                    @endforeach
                </select>
                @error('id_sub_kategori_asset')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Distributor</label>
                <select name="id_distributor" class="form-control @error('id_distributor') is-invalid @enderror">
                    <option value="">Pilih Distributor</option>
                    @foreach($distributors as $d)
                        <option value="{{ $d->id_distributor }}">{{ $d->nama_distributor }}</option>
                    @endforeach
                </select>
                @error('id_distributor')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Kode Pengadaan</label>
                <input type="text" name="kode_pengadaan" class="form-control @error('kode_pengadaan') is-invalid @enderror">
                @error('kode_pengadaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>No Invoice</label>
                <input type="text" name="no_invoice" class="form-control @error('no_invoice') is-invalid @enderror">
                @error('no_invoice')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>No Seri Barang</label>
                <input type="text" name="no_seri_barang" class="form-control @error('no_seri_barang') is-invalid @enderror">
                @error('no_seri_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Tahun Produksi</label>
                <input type="text" name="tahun_produksi" class="form-control @error('tahun_produksi') is-invalid @enderror">
                @error('tahun_produksi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Tanggal Pengadaan</label>
                <input type="date" name="tgl_pengadaan" class="form-control @error('tgl_pengadaan') is-invalid @enderror">
                @error('tgl_pengadaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Harga Barang</label>
                <input type="number" name="harga_barang" class="form-control @error('harga_barang') is-invalid @enderror">
                @error('harga_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Nilai Barang</label>
                <input type="number" name="nilai_barang" class="form-control @error('nilai_barang') is-invalid @enderror">
                @error('nilai_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>FB</label>
                <select name="fb" class="form-control @error('fb') is-invalid @enderror">
                    <option value="">Pilih FB</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
                @error('fb')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>