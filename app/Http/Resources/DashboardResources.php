<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'data'=> [
                'card'=>[
                    'total_order' =>  $this[0],
                    'total_pendapatan' => $this[1],
                    'total_product_terjual'=>$this[2],
                    'total_preorder'=>$this[3],
                ],
                'product'=> $this[4]->map(function ($product){
                    return [
                        'id'=> $product->id,
                        'nama_product'=> $product->nama_product,
                        'harga'=>$product->harga_rendah,
                        'fotos' => FotoResources::collection($product->fotos),
                        'deskripsi'=>$product->deskripsi,
                    ];
                }),
                'top_sales_product'=>$this[5]->map(function ($product){
                    return [
                        'nama_product'=>$product->products->nama_product,
                        'terjual'=>$product->totalJumlah,
                    ];
                })
            ]
        ];
    }
}
