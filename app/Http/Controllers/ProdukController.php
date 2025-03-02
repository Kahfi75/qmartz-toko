<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'nullable|integer|min:0'
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok ?? 0
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'nullable|integer|min:0'
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok ?? 0
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
