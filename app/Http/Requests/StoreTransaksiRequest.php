<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTransaksiRequest extends FormRequest
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
            'tanggal' => 'required',
            'product' => 'required',
            'methode_pembayaran' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'is_complete' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required.',
        ];
    }
    function failedValidation(Validator $validator)  {
        throw new HttpResponseException(response([
            'errors'=>$validator->getMessageBag()
        ]));
    }   
}
