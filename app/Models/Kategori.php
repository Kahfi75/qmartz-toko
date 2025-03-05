<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // Pastikan sesuai dengan tabel di database
    protected $primaryKey = 'id'; // Sesuaikan dengan primary key tabel
    public $timestamps = false; // Matikan timestamps jika tidak digunakan

    protected $fillable = ['nama_kategori'];
}
