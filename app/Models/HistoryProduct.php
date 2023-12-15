<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_product',
        'harga',
        'deskripsi',
        'link_shopee',
        'stok',
        'spesifikasi_product',
    ];
}
