<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Qmartz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Tambah Produk</h2>
        <div class="card shadow p-4">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" onchange="previewImage();">
                            <img id="image-preview" class="mt-2 img-thumbnail" src="{{ asset('assets/images/default.jpg') }}" alt="Preview" width="150">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="supplier_id" class="form-label">Supplier</label>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="harga_beli" class="form-label">Harga Beli</label>
                            <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                    <input type="date" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage() {
            const input = document.getElementById('product_image');
            const preview = document.getElementById('image-preview');
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>