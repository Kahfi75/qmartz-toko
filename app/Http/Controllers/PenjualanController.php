<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('details.produk')->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('penjualan.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk.*' => 'required|exists:produk,id_produk',
            'jumlah.*' => 'required|integer|min:1',
            'diskon' => 'nullable|integer|min:0',
            'bayar' => 'required|integer|min:0',
        ]);

        $penjualan = Penjualan::create([
            'id_user' => Auth::id(),
            'total_item' => 0,
            'total_harga' => 0,
            'diskon' => $request->diskon ?? 0,
            'bayar' => $request->bayar,
            'diterima' => $request->bayar
        ]);

        $totalHarga = 0;
        $totalItem = 0;

        foreach ($request->id_produk as $index => $id_produk) {
            $produk = Produk::find($id_produk);
            $jumlah = $request->jumlah[$index];
            $subtotal = ($produk->harga_jual * $jumlah) - ($request->diskon ?? 0);

            PenjualanDetail::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'id_produk' => $id_produk,
                'harga_jual' => $produk->harga_jual,
                'jumlah' => $jumlah,
                'diskon' => $request->diskon ?? 0,
                'subtotal' => $subtotal
            ]);

            $totalHarga += $subtotal;
            $totalItem += $jumlah;
        }

        $penjualan->update([
            'total_item' => $totalItem,
            'total_harga' => $totalHarga,
            'diterima' => $request->bayar
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil disimpan!');
    }
}
