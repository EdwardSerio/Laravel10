<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotographyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'txtid' => 'required|min:16|max:16',
            'txtfullname' => 'required',
            'txtaddress' => 'required',
            'txtgender' => 'required',
            'txtphone' => 'required|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'txtid.required' => 'Tidak boleh kosong',
            'txtid.min' => 'ID Penyewa harus terdiri dari 16 karakter',
            'txtid.max' => 'ID Penyewa harus terdiri dari 16 karakter',
            'txtfullname.required' => 'Tidak boleh kosong',
            'txtaddress.required' => 'Tidak boleh kosong',
            'txtgender.required' => 'Tidak boleh kosong',
            'txtphone.required' => 'Tidak boleh kosong',
            'txtphone.numeric' => 'Nomor Telepon harus berupa angka',
        ];
    }
}
