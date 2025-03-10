<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori - Qmartz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #212529;
            color: white;
            padding: 15px;
        }

        .sidebar .nav-link {
            color: white;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #343a40;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
        }
    </style>
</head>

<body>
    <nav class="sidebar">
        <div class="text-center mb-3">
            <i class="fas fa-store fs-4"></i>
            <span class="fs-5 fw-bold">Qmartz POS</span>
        </div>
        <hr>
        <ul class="nav flex-column">
            <li><a href="{{ route('dashboard') }}" class="nav-link active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
            <li><a href="{{ route('kasir') }}" class="nav-link"><i class="fas fa-cash-register me-2"></i> Kasir</a></li>
            <li>
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#produkDropdown">
                    <i class="fas fa-box me-2"></i> Produk
                </a>
                <ul class="collapse list-unstyled ps-3" id="produkDropdown">
                    <li><a href="{{ route('produk.index') }}" class="nav-link">Daftar Produk</a></li>
                    <li><a href="{{ route('produk.create') }}" class="nav-link">Tambah Produk</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="transaksiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i> Transaksi
                </a>
                <ul class="dropdown-menu" aria-labelledby="transaksiDropdown">
                    <li><a class="dropdown-item" href="{{ route('transaksi.pembelian') }}">Pembelian</a></li>
                    <li><a class="dropdown-item" href="{{ route('transaksi.penjualan') }}">Penjualan</a></li>
                </ul>
            </li>

            <li><a href="#" class="nav-link"><i class="fas fa-chart-line me-2"></i> Laporan</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-cog me-2"></i> Pengaturan</a></li>
        </ul>
    </nav>

    <div class="main-content">
        <h4 class="mb-3">Daftar Kategori</h4>
        <p class="mb-4">Kelola kategori produk untuk Qmartz POS.</p>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
            <i class="fas fa-plus"></i> Tambah Kategori
        </button>

        <!-- Modal Tambah Kategori -->
        <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="modalTambahKategoriLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahKategoriLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $item->id_kategori) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('kategori.destroy', $item->id_kategori) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>