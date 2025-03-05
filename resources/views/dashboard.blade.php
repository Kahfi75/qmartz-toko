<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Qmartz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            transition: width 0.3s;
        }

        .sidebar .nav-link {
            color: white;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .dropdown-menu {
            background: #343a40;
            border: none;
        }

        .sidebar .dropdown-menu .dropdown-item {
            color: white;
        }

        .sidebar .dropdown-menu .dropdown-item:hover {
            background: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3">
        <a href="#" class="d-flex align-items-center mb-3 text-white text-decoration-none">
            <i class="fas fa-store fs-4 me-2"></i>
            <span class="fs-5 fw-bold">Qmartz POS</span>
        </a>
        <hr>
        <ul class="nav flex-column mb-auto">
            <li><a href="#" class="nav-link active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('kasir') }}" class="nav-link"><i class="fas fa-cash-register"></i> Kasir</a></li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#produkDropdown">
                    <i class="fas fa-box"></i> Produk
                </a>
                <ul class="collapse list-unstyled ps-3" id="produkDropdown">
                    <li><a href="{{ route('produk.index') }}" class="nav-link">Daftar Produk</a></li>
                    <li><a href="{{ route('produk.create') }}" class="nav-link">Tambah Produk</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#kategoriDropdown">
                    <i class="fas fa-tags"></i> Kategori
                </a>
                <ul class="collapse list-unstyled ps-3" id="kategoriDropdown">
                    <li><a href="{{ route('kategori.index') }}" class="nav-link">Daftar Kategori</a></li>
                    <li><a href="{{ route('kategori.create') }}" class="nav-link">Tambah Kategori</a></li>
                </ul>
            </li>
            <li><a href="#" class="nav-link"><i class="fas fa-exchange-alt"></i> Transaksi</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-chart-line"></i> Laporan</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-cog"></i> Pengaturan</a></li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>Admin</strong>
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
    <div class="content container-fluid">
        <h4 class="mb-3">Dashboard Admin</h4>
        <p class="mb-4">Selamat datang di Qmartz POS. Berikut adalah ringkasan aktivitas toko Anda.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
