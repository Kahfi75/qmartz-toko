<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Tambah Produk</h2>

        <div class="card shadow p-4 mb-4">
            <h4>Form Tambah Produk</h4>
            <form action="{{ route('produk.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <!-- Kode Barang (Auto-Generated) -->
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" readonly>
                        </div>

                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}"
                                placeholder="Masukkan nama produk" required>
                            @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Merk -->
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control @error('merk') is-invalid @enderror"
                                id="merk" name="merk" value="{{ old('merk') }}"
                                placeholder="Masukkan merk produk">
                            @error('merk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Satuan -->
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                id="satuan" name="satuan" value="{{ old('satuan') }}" required
                                placeholder="Contoh: pcs, kg, liter">
                            @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Dropdown Kategori -->
                        <div class="mb-3">
                            <label for="id_kategori" class="form-label">Kategori</label>
                            <select class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori"
                                name="id_kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}"
                                    {{ old('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Stok -->
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                id="stok" name="stok" value="{{ old('stok') }}" required>
                            @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga Beli -->
                        <div class="mb-3">
                            <label for="harga_beli" class="form-label">Harga Beli</label>
                            <input type="number" class="form-control @error('harga_beli') is-invalid @enderror"
                                id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}" required>
                            @error('harga_beli')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Diskon -->
                        <div class="mb-3">
                            <label for="diskon" class="form-label">Diskon (%)</label>
                            <input type="number" class="form-control @error('diskon') is-invalid @enderror"
                                id="diskon" name="diskon" value="{{ old('diskon') }}">
                            @error('diskon')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga Jual -->
                        <div class="mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control @error('harga_jual') is-invalid @enderror"
                                id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}" required>
                            @error('harga_jual')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script untuk Generate Kode Barang -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let kodeBarangField = document.getElementById("kode_barang");
            let randomCode = "PRD-" + Math.floor(10000 + Math.random() * 90000); // PRD-XXXXX
            kodeBarangField.value = randomCode;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
