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
            'is_complete'=>$this->is_complete,
            'products'=>new ProductResources($this->whenLoaded('products')),

        ];
    }
}
