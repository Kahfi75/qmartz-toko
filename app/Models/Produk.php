<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = true;

    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'harga_beli',
        'harga_jual',
        'stok',
        'tanggal_kadaluarsa',
        'product_image' // Hapus jika tidak ada di database
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

  
}
