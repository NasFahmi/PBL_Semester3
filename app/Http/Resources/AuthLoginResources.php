<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthLoginResources extends JsonResource
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
            'data' => [
                'token' => $this->createToken($request->username)->plainTextToken,
                'id' => $this->id,
                'nama' => $this->nama,
                'email' => $this->email,
                'link_toko' => $this->link_toko,
                'link_wa' => $this->link_wa,
                'link_ig' => $this->link_ig,
                'alamat' => $this->alamat,
            ],
        ];
    }
}
