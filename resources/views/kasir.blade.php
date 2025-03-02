<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir - Qmartz POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <li><a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                <li><a href="{{ route('kasir') }}" class="nav-link text-white active">Kasir</a></li>
                <li><a href="#" class="nav-link text-white">Produk</a></li>
                <li><a href="#" class="nav-link text-white">Transaksi</a></li>
                <li><a href="#" class="nav-link text-white">Laporan</a></li>
                <li><a href="#" class="nav-link text-white">Pengaturan</a></li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Kasir</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
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
        <div class="flex-grow-1 p-4">
            <h2>Kasir</h2>
            <p>Silakan pilih produk dan lakukan transaksi.</p>

            <div class="row">
                <!-- Daftar Produk -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Daftar Produk</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Produk A</td>
                                        <td>Rp 10.000</td>
                                        <td>20</td>
                                        <td><button class="btn btn-sm btn-primary">Tambah</button></td>
                                    </tr>
                                    <tr>
                                        <td>Produk B</td>
                                        <td>Rp 15.000</td>
                                        <td>15</td>
                                        <td><button class="btn btn-sm btn-primary">Tambah</button></td>
                                    </tr>
                                    <tr>
                                        <td>Produk C</td>
                                        <td>Rp 20.000</td>
                                        <td>10</td>
                                        <td><button class="btn btn-sm btn-primary">Tambah</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan Transaksi -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Ringkasan Transaksi</div>
                        <div class="card-body">
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Produk A</span>
                                    <span>Rp 10.000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Produk B</span>
                                    <span>Rp 15.000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <span>Rp 25.000</span>
                                </li>
                            </ul>
                            <div class="mb-3">
                                <label for="bayar" class="form-label">Jumlah Bayar</label>
                                <input type="number" class="form-control" id="bayar" placeholder="Masukkan jumlah uang">
                            </div>
                            <button class="btn btn-success w-100">Proses Transaksi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
