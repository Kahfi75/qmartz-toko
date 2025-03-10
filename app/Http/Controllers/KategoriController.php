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
        $kategori = Kategori::orderBy('id_kategori', 'desc')->paginate(10);
        return view('kategori.index', compact('kategori')); // Perbaikan path view
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
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori'
        ]);

        Kategori::create($request->only(['nama_kategori']));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!'); // Perbaikan route
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
                Rule::unique('kategori', 'nama_kategori')->ignore($kategori->id)
            ]
        ]);

        $kategori->update($request->only(['nama_kategori']));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!'); // Perbaikan route
    }

    // Hapus kategori
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!'); // Perbaikan route
    }
}
