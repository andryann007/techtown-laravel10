<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    use HasFactory;

    protected $table = 'detail_produk';

    protected $fillable = [
        'id_produk',
        'jaringan',
        'os',
        'cpu',
        'gpu',
        'ram',
        'ukuran_layar',
        'tipe_layar',
        'resolusi_layar',
        'kamera_belakang',
        'kamera_depan',
        'sim',
        'baterai',
        'dimensi',
        'berat'
    ];
}
