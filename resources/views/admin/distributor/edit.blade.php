<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Distributor</title>
    <style>
        /* Reset basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        /* Main Heading */
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        /* Form Container */
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        /* Form Elements */
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Form Actions */
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

        /* Responsive Design */
        @media (max-width: 600px) {
            .form-container {
                padding: 15px;
                width: 90%;
            }

            h1 {
                font-size: 1.5rem;
            }

            button {
                width: 48%;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<h1>Edit Distributor</h1>

<div class="form-container">
    <form action="{{ route('admin.distributor.update', $distributor->id_distributor) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_distributor">Nama Distributor</label>
        <input type="text" name="nama_distributor" id="nama_distributor" value="{{ old('nama_distributor', $distributor->nama_distributor) }}" required><br>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $distributor->alamat) }}" required><br>

        <label for="no_telp">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $distributor->no_telp) }}" required><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $distributor->email) }}" required><br>

        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $distributor->keterangan) }}"><br>

        <div class="form-actions">
            <button type="submit">Update</button>
            <button type="button"><a href="{{ route('admin.distributor.index') }}" class="btn btn-secondary">Kembali</a></button>
        </div>
    </form>
</div>

</body>
</html>