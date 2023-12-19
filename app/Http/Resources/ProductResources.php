<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                "id"=> $this->id,
                'nama_product'=>$this->nama_product,
                'harga'=>$this->harga,
                'deskripsi'=>$this->deskripsi,
                'link_shopee'=> $this->link_shopee,
                'stok'=>$this->stok,
                'spesifikasi_product'=>$this->spesifikasi_product,
                'fotos' => FotoResources::collection($this->whenLoaded('fotos')),
                'varians' => VarianResources::collection($this->whenLoaded('varians')),
        ];
    }
}
