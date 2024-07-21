<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen';
    
    protected $fillable = [
        'kode_peminjaman',
        'pustaka_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'jenis_denda',
        'denda_non_moneter',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pustaka()
    {
        return $this->belongsTo(Pustaka::class);
    }
}
