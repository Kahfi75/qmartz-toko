<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        // Mengambil data kategori untuk dropdown
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_produk' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'kategori_id' => 'required|integer',
            'stok' => 'nullable|integer|min:0',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'tanggal_kadaluarsa' => 'nullable|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('produk_images', 'public');
        }

        Produk::create([
            'product_image' => $imagePath,
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok ?? 0,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
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
            'nama_produk' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'kategori_id' => 'required|integer',
            'stok' => 'nullable|integer|min:0',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'tanggal_kadaluarsa' => 'nullable|date',
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('product_image')) {
            if ($produk->product_image) {
                Storage::disk('public')->delete($produk->product_image);
            }
            $imagePath = $request->file('product_image')->store('produk_images', 'public');
        } else {
            $imagePath = $produk->product_image;
        }

        $produk->update([
            'product_image' => $imagePath,
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok ?? 0,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->product_image) {
            Storage::disk('public')->delete($produk->product_image);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
