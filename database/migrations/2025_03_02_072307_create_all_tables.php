<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    
        // Kategori Table
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori')->unique();
            $table->timestamps();
        });

        // Produk Table
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->foreignId('id_kategori')->constrained('kategori', 'id_kategori')->onDelete('cascade');
            $table->string('nama_produk')->unique();
            $table->string('merk')->nullable();
            $table->integer('harga_beli');
            $table->integer('diskon')->default(0);
            $table->integer('harga_jual');
            $table->integer('stok')->default(0);
            $table->timestamps();
        });

        // Member Table
        Schema::create('member', function (Blueprint $table) {
            $table->id('id_member');
            $table->string('kode_member')->unique();
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('telepon');
            $table->timestamps();
        });

        // Supplier Table
        Schema::create('supplier', function (Blueprint $table) {
            $table->id('id_supplier');
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('telepon');
            $table->timestamps();
        });

        // Pengeluaran Table
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id('id_pengeluaran');
            $table->text('deskripsi');
            $table->integer('nominal');
            $table->timestamps();
        });

        // Pembelian Table
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->foreignId('id_supplier')->constrained('supplier', 'id_supplier')->onDelete('cascade');
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->integer('diskon')->default(0);
            $table->integer('bayar');
            $table->timestamps();
        });

        // Pembelian Detail Table
        Schema::create('pembelian_detail', function (Blueprint $table) {
            $table->id('id_pembelian_detail');
            $table->foreignId('id_pembelian')->constrained('pembelian', 'id_pembelian')->onDelete('cascade');
            $table->foreignId('id_produk')->constrained('produk', 'id_produk')->onDelete('cascade');
            $table->integer('harga_beli');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
        });

        // Penjualan Table
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->foreignId('id_member')->nullable()->constrained('member', 'id_member')->onDelete('set null');
            $table->foreignId('id_user')->constrained('users', 'id')->onDelete('cascade');
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->integer('diskon')->default(0);
            $table->integer('bayar');
            $table->integer('diterima')->default(0);
            $table->timestamps();
        });

        // Penjualan Detail Table
        Schema::create('penjualan_detail', function (Blueprint $table) {
            $table->id('id_penjualan_detail');
            $table->foreignId('id_penjualan')->constrained('penjualan', 'id_penjualan')->onDelete('cascade');
            $table->foreignId('id_produk')->constrained('produk', 'id_produk')->onDelete('cascade');
            $table->integer('harga_jual');
            $table->integer('jumlah');
            $table->integer('diskon')->default(0);
            $table->integer('subtotal');
            $table->timestamps();
        });

        // Setting Table
        Schema::create('setting', function (Blueprint $table) {
            $table->id('id_setting');
            $table->string('nama_perusahaan');
            $table->text('alamat')->nullable();
            $table->string('telepon');
            $table->string('path_logo')->nullable();
            $table->string('path_kartu_member')->nullable();
            $table->tinyInteger('tipe_nota');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setting');
        Schema::dropIfExists('penjualan_detail');
        Schema::dropIfExists('penjualan');
        Schema::dropIfExists('pembelian_detail');
        Schema::dropIfExists('pembelian');
        Schema::dropIfExists('pengeluaran');
        Schema::dropIfExists('supplier');
        Schema::dropIfExists('member');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('users');
    }
};
