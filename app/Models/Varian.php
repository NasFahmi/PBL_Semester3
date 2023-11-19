<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_varian',
        'product_id ',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
