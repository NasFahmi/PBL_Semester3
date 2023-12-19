<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return Auth::user() !== null;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_product' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'link_shopee' => 'required',
            'stok' => 'required',
            'spesifikasi_product' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required.',
            'image' => 'The :attribute must be an image.',
            'mimes' => 'The :attribute must be a file of type: jpeg, png, jpg.',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
        ];
    }

    function failedValidation(Validator $validator)  {
        throw new HttpResponseException(response([
            'errors'=>$validator->getMessageBag()
        ]));
    }   
}
