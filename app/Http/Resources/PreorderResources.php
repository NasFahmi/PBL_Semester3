<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PreorderResources extends JsonResource
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
            'is_DP'=>$this->is_DP,
            'down_payment'=>$this->down_payment,
            'tanggal_pembayaran_preoreder'=>$this->tanggal_pembayaran_preoreder,
            'tanggal_pembayaran_down_payment'=>$this->tanggal_pembayaran_down_payment,
        ];
    }
}
