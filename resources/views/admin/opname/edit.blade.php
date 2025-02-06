<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Opname</title>
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
        input[type="text"], select, textarea, input[type="date"] {
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
    <script>
        function handleKondisiChange() {
            const kondisi = document.getElementById('kondisi').value;
            const keterangan = document.getElementById('keterangan');
            if (kondisi === 'baik') {
                keterangan.value = 'tidak ada';
                keterangan.disabled = true;
            } else {
                keterangan.value = '';
                keterangan.disabled = false;
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            handleKondisiChange();
            document.getElementById('kondisi').addEventListener('change', handleKondisiChange);
            document.querySelector('form').addEventListener('submit', function() {
                const keterangan = document.getElementById('keterangan');
                if (keterangan.disabled) {
                    keterangan.disabled = false;
                }
            });
        });
    </script>
</head>
<body>
    <h1>Edit Opname</h1>

    <div class="form-container">
        <form action="{{ route('admin.opname.update', ['opname' => $opname->id_opname]) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="id_pengadaan">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" required>
                @foreach ($pengadaans as $pengadaan)
                    <option value="{{ $pengadaan->id_pengadaan }}" 
                        {{ $opname->id_pengadaan == $pengadaan->id_pengadaan ? 'selected' : '' }}>
                        {{ $pengadaan->masterBarang->nama_barang }}
                    </option>
                @endforeach
            </select>

            <label for="tgl_opname">Tanggal Opname</label>
            <input type="date" name="tgl_opname" id="tgl_opname" value="{{ $opname->tgl_opname }}" required>

            <label for="kondisi">Kondisi</label>
            <select name="kondisi" id="kondisi" required>
                <option value="baik" {{ $opname->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="rusak" {{ $opname->kondisi == 'rusak' ? 'selected' : '' }}>Rusak</option>
                <option value="hilang" {{ $opname->kondisi == 'hilang' ? 'selected' : '' }}>Hilang</option>
            </select>

            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" required>{{ $opname->keterangan }}</textarea>

            <div class="form-actions">
                <button type="submit">Update</button>
                <button type="button"><a href="{{ route('admin.opname.index') }}">Kembali</a></button>
            </div>
        </form>
    </div>
</body>
</html>