<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Qmartz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .sidebar {
            width: 250px;
            position: fixed;
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="text-center mb-3">
            <i class="fas fa-store fs-4"></i>
            <span class="fs-5 fw-bold">Qmartz POS</span>
        </div>
        <hr>
        <ul class="nav flex-column">
            <li><a href="#" class="nav-link active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
            <li><a href="{{ route('kasir') }}" class="nav-link"><i class="fas fa-cash-register me-2"></i> Kasir</a></li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#produkDropdown">
                    <i class="fas fa-box me-2"></i> Produk
                </a>
                <ul class="collapse list-unstyled ps-3" id="produkDropdown">
                    <li><a href="{{ route('produk.index') }}" class="nav-link">Daftar Produk</a></li>
                    <li><a href="{{ route('produk.create') }}" class="nav-link">Tambah Produk</a></li>
                </ul>
            </li>
            <li><a href="#" class="nav-link"><i class="fas fa-exchange-alt me-2"></i> Transaksi</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-chart-line me-2"></i> Laporan</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-cog me-2"></i> Pengaturan</a></li>
        </ul>
        <hr>
        <div class="text-center">
            <a href="#" class="text-white text-decoration-none d-flex align-items-center justify-content-center">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>Admin</strong>
            </a>
        </div>
    </nav>

    <!-- Konten -->
    <main class="content">
        <div class="container mt-4">
            <h4 class="mb-3">Daftar Produk</h4>
            <p class="mb-4">Kelola produk toko Anda dengan efisien menggunakan Qmartz POS.</p>

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <a href="#" class="btn btn-success">Import</a>
                    <a href="#" class="btn btn-warning">Export</a>
                    <a href="#" class="btn btn-primary">Tambah Produk</a>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Cari produk" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Pemasok</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="default.jpg" alt="Produk" width="50"></td>
                            <td>Produk Contoh</td>
                            <td>Elektronik</td>
                            <td>ABC Supplier</td>
                            <td>Rp 100.000</td>
                            <td><span class="badge bg-success">Valid</span></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
