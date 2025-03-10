<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Penjualan - Qmartz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4">
        <h3><i class="fas fa-cash-register"></i> Transaksi Penjualan</h3>
        <hr>

        <!-- Form Input Produk -->
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Scan atau Masukkan Kode Produk">
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" placeholder="Jumlah">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100"><i class="fas fa-plus"></i> Tambah</button>
            </div>
        </div>

        <!-- Tabel Daftar Produk -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data Barang Ditambahkan -->
            </tbody>
        </table>

        <!-- Total, Diskon, Pembayaran -->
        <div class="row">
            <div class="col-md-4">
                <h5>Total: <span class="fw-bold">Rp 0</span></h5>
            </div>
            <div class="col-md-4">
                <input type="number" class="form-control" placeholder="Diskon (Rp)">
            </div>
            <div class="col-md-4">
                <input type="number" class="form-control" placeholder="Bayar (Rp)">
            </div>
        </div>

        <!-- Kembalian & Konfirmasi -->
        <div class="row mt-3">
            <div class="col-md-6">
                <h5>Kembalian: <span class="fw-bold">Rp 0</span></h5>
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-success"><i class="fas fa-check"></i> Proses Pembayaran</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
