<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pustaka extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pustaka',
        'judul_pustaka',
        'kategori_pustaka_id',
        'penerbit_id',
        'penulis_id',
        'tahun',
        'gambar_pustaka',
        'halaman',
        'stok',
        'rak'
    ];
}
