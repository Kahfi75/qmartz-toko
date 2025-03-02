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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Qmartz POS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kasir') }}">Kasir</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="produkDropdown" role="button" data-bs-toggle="dropdown">Produk</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-bold" href="{{ route('produk.index') }}">Daftar Produk</a></li>
                            <li><a class="dropdown-item" href="{{ route('produk.create') }}">Tambah Produk</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Laporan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pengaturan</a></li>
                </ul>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>Admin</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-4 text-center">Tambah Produk</h2>
        <div class="card shadow p-4">
            <form action="produk_store.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" onchange="previewImage();">
                            <img id="image-preview" class="mt-2 img-thumbnail" src="assets/images/default.jpg" alt="Preview" width="150">
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
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="supplier_id" class="form-label">Supplier</label>
                            <select class="form-control" id="supplier_id" name="supplier_id" required>
                                <option value="">-- Pilih Supplier --</option>
                                <option value="1">PT Sumber Berkah</option>
                                <option value="2">CV Anugerah</option>
                            </select>
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
                    <a href="produk_index.php" class="btn btn-danger">Batal</a>
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
