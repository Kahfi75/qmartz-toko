<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        $kategori = Kategori::all();
        return view('produk.index', compact('produk', 'kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'nullable|unique:produk,kode_barang',
            'nama_produk' => 'required|unique:produk,nama_produk',
            'satuan' => 'required|string',
            'merk' => 'nullable|string',
            'harga_beli' => 'required|integer',
            'diskon' => 'nullable|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        // Gunakan kode_barang dari request, jika kosong, buat kode otomatis
        $kode_barang = $request->kode_barang ?? strtoupper(uniqid('KB-'));

        Produk::create([
            'kode_barang' => $kode_barang,
            'nama_produk' => $request->nama_produk,
            'satuan' => $request->satuan,
            'merk' => $request->merk,
            'harga_beli' => $request->harga_beli,
            'diskon' => $request->diskon ?? 0, // Set default 0
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok ?? 0, // Set default 0
            'id_kategori' => $request->id_kategori,
            'user_id' => Auth::id() ?? 1, // Default ke user_id = 1 jika tidak login
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'nullable|unique:produk,kode_barang,' . $id . ',id_produk',
            'nama_produk' => 'required|unique:produk,nama_produk,' . $id . ',id_produk',
            'satuan' => 'required|string',
            'merk' => 'nullable|string',
            'harga_beli' => 'required|integer',
            'diskon' => 'nullable|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $produk = Produk::findOrFail($id);

        // Pastikan kode_barang tidak kosong
        $kode_barang = $request->kode_barang ?: $produk->kode_barang;

        $produk->update([
            'kode_barang' => $kode_barang,
            'nama_produk' => $request->nama_produk,
            'satuan' => $request->satuan,
            'merk' => $request->merk,
            'harga_beli' => $request->harga_beli,
            'diskon' => $request->diskon,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'user_id' => Auth::id() ?? $produk->user_id,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
