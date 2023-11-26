<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'pembeli_id',
        'product_id',
        'methode_pembayaran_id',
        'jumlah',
        'total_harga',
        'keterangan',
        'is_Preorder',
        'Preorder_id',
        'is_complete',
    ];
    public function pembelis(){
        return $this->belongsTo(Pembeli::class,'pembeli_id','id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function methodePembayarans(){
        return $this->belongsTo(MethodePembayaran::class,'methode_pembayaran_id','id');
    }
    public function preorders(){
        return $this->belongsTo(Preorder::class,'Preorder_id','id');
    }
}
