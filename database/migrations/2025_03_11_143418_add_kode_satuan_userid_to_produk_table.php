<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            // Cek jika kolom belum ada untuk menghindari error duplikasi
            if (!Schema::hasColumn('produk', 'kode_barang')) {
                $table->string('kode_barang')->after('id_produk');
            }

            if (!Schema::hasColumn('produk', 'satuan')) {
                $table->string('satuan')->after('nama_produk');
            }

            if (!Schema::hasColumn('produk', 'user_id')) {
                $table->foreignId('user_id')
                    ->default(1)
                    ->after('stok')
                    ->constrained('users') // Mengacu pada tabel users
                    ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn('kode_barang');
            $table->dropColumn('satuan');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
