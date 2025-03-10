<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function pembelian()
    {
        return view('transaksi.pembelian');
    }

    public function penjualan()
    {
        return view('transaksi.penjualan');
    }
}
