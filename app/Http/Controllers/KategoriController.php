<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->paginate(10);
        return view('produk.kategori', compact('kategori'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori'
        ]);

        Kategori::create($request->only(['nama_kategori']));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form edit kategori
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    // Menyimpan perubahan kategori
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => [
                'required', 'string', 'max:255',
                Rule::unique('kategoris', 'nama_kategori')->ignore($kategori->id)
            ]
        ]);

        $kategori->update($request->only(['nama_kategori']));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Hapus kategori
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
