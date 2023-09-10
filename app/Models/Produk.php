<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_kategori',
        'id_brand',
        'nama',
        'harga',
        'gambar',
        'caption_gambar'
    ];
}
