<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Qmartz</title>
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
                <li class="nav-item">
                    <a href="#" class="nav-link text-white active">Dashboard</a>
                </li>
                <li><a href="{{ route('kasir')}}" class="nav-link text-white">Kasir</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="produkDropdown" role="button" data-bs-toggle="dropdown">
                        Produk
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{ route('produk.index') }}">Daftar Produk</a></li>
                        <li><a class="dropdown-item" href="{{ route('produk.create') }}">Tambah Produk</a></li>
                    </ul>
                </li>

                <li><a href="#" class="nav-link text-white">Transaksi</a></li>
                <li><a href="#" class="nav-link text-white">Laporan</a></li>
                <li><a href="#" class="nav-link text-white">Pengaturan</a></li>
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
        <div class="flex-grow-1 p-4">
            <!-- Notifikasi -->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <h2>Welcome to Qmartz POS</h2>
            <p>Content goes here...</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>