<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotographyRequest extends FormRequest
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
        'txtid' => 'required|unique:photographies,idnumber|min:16|max:16',
        'txtfullname' => 'required',
        'txtaddress' => 'required',
        'txtgender' => 'required',
        'txtphone' => 'required|numeric',
    ];
}

public function messages(): array
{
    return [
        'txtid.required' => 'Tidak boleh Kosong',
        'txtid.unique' => 'Sudah ada didalam tabel',
        'txtfullname.required' => 'Tidak boleh Kosong',
        'txtphone.required' => 'Tidak boleh Kosong'
    ];
}
}
