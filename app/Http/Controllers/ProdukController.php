<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get(); // Ambil semua produk beserta kategorinya
        $kategori = Kategori::all(); // Ambil semua kategori untuk form dropdown

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
            'nama_produk' => 'required|unique:produk',
            'merk' => 'nullable|string',
            'harga_beli' => 'required|integer',
            'diskon' => 'nullable|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        Produk::create($request->all());
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
            'nama_produk' => 'required|unique:produk,nama_produk,' . $id . ',id_produk',
            'merk' => 'nullable|string',
            'harga_beli' => 'required|integer',
            'diskon' => 'nullable|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
