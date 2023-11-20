<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeratJenis extends Model
{
    use HasFactory;
    protected $fillable =[
        'berat_jenis',
        'product_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}