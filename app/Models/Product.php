<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_product',
        'harga_rendah',
        'harga_tinggi',
        'deskripsi',
        'link_shopee',
        'stok',
        'spesifikasi_product',
    ];
    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    public function varians()
    {
        return $this->hasMany(Varian::class);
    }

    public function beratJenis()
    {
        return $this->hasMany(BeratJenis::class);
    }
    public function transaksis(){
        return $this->hasOne(Transaksi::class);
    }
}
