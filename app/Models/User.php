<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users'; // Tabel yang digunakan

    protected $fillable = ['name', 'email', 'password', 'foto', 'level'];

    protected $hidden = ['password', 'remember_token'];
}
