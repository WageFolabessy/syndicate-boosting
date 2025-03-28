<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLabelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama label harus diisi.',
            'name.string'   => 'Nama label harus berupa teks.',
            'name.max'      => 'Nama label maksimal 255 karakter.'
        ];
    }
}
