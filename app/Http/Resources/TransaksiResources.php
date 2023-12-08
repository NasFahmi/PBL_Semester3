<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'tanggal'=>$this->tanggal,
            'jumlah'=>$this->jumlah,
            'total_harga'=>$this->total_harga,
            'keterangan'=>$this->keterangan,
            'is_Preorder'=>$this->is_Preorder,
            'is_complete'=>$this->is_complete,
            'pembeli'=> new PembeliResources($this->whenLoaded('pembelis')),
            'methode_pembayaran'=>new MethodePembayaranResources($this->whenLoaded('methode_pembayaran')),
            'products'=>new ProductResources($this->whenLoaded('products')),
            'preorders'=>new PreorderResources($this->whenLoaded('preorders')),
        ];
    }
}
