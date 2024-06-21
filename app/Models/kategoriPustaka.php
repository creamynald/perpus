<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriPustaka extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kategori_pustaka',
        'nama_kategori_pustaka',
    ];
}
