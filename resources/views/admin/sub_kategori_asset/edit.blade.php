<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sub Kategori Asset</title>
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

        input[type="text"], select {
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

<h1>Edit Sub Kategori Asset</h1>

<div class="form-container">
    <form action="{{ route('admin.sub_kategori_asset.update', $subKategoriAsset->id_sub_kategori_asset) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_kategori_asset">Kategori Asset</label>
        <select name="id_kategori_asset" id="id_kategori_asset" required>
            @foreach ($kategoriAssets as $kategoriAsset)
                <option value="{{ $kategoriAsset->id_kategori_asset }}" {{ $kategoriAsset->id_kategori_asset == $subKategoriAsset->id_kategori_asset ? 'selected' : '' }}>{{ $kategoriAsset->kategori_asset }}</option>
            @endforeach
        </select><br>

        <label for="kode_sub_kategori_asset">Kode Sub Kategori Asset</label>
        <input type="text" name="kode_sub_kategori_asset" id="kode_sub_kategori_asset" value="{{ old('kode_sub_kategori_asset', $subKategoriAsset->kode_sub_kategori_asset) }}" required><br>

        <label for="sub_kategori_asset">Sub Kategori Asset</label>
        <input type="text" name="sub_kategori_asset" id="sub_kategori_asset" value="{{ old('sub_kategori_asset', $subKategoriAsset->sub_kategori_asset) }}" required><br>

        <div class="form-actions">
            <button type="submit">Update</button>
            <button type="button"><a href="{{ route('admin.sub_kategori_asset.index') }}" class="btn btn-secondary">Kembali</a></button>
        </div>
    </form>
</div>

</body>
</html>