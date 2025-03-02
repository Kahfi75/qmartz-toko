<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List - Qmartz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 250px; height: 100vh;">
            <a href="#" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                <span class="fs-5 fw-bold">Qmartz POS</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white active">Dashboard</a>
                </li>
                <li><a href="{{ route('kasir')}}" class="nav-link text-white">Kasir</a></li>
                <li class="nav-item">
                    <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="collapse"
                        data-bs-target="#produkDropdown">Produk</a>
                    <ul class="collapse list-unstyled ps-3" id="produkDropdown">
                        <li><a class="nav-link text-white" href="{{ route('produk.index') }}">Daftar Produk</a></li>
                        <li><a class="nav-link text-white" href="{{ route('produk.create') }}">Tambah Produk</a></li>
                    </ul>
                </li>
                <li><a href="#" class="nav-link text-white">Transaksi</a></li>
                <li><a href="#" class="nav-link text-white">Laporan</a></li>
                <li><a href="#" class="nav-link text-white">Pengaturan</a></li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item w-100 text-start">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid mt-4">
            <h4 class="mb-3">Daftar Produk</h4>
            <p class="mb-4">Kelola produk toko Anda dengan efisien menggunakan Qmartz POS.</p>

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <a href="#" class="btn btn-success">Import</a>
                    <a href="#" class="btn btn-warning">Export</a>
                    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
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
                        <!-- Tambahkan data lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
