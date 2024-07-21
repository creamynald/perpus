<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pustaka extends Model
{
    use HasFactory;

    protected $fillable = ['kode_pustaka', 'judul_pustaka', 'kategori_pustaka_id', 'penerbit_id', 'penulis_id', 'tahun', 'gambar_pustaka', 'halaman', 'stok', 'rak'];

    public function kategori()
    {
        return $this->belongsTo(KategoriPustaka::class, 'kategori_pustaka_id');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id');
    }
}
