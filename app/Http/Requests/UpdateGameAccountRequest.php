<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'game_id'        => 'sometimes|required|exists:games,id',
            'account_name'   => 'sometimes|required|string|max:255',
            'description'    => 'nullable|string',
            'features'       => 'nullable|string',
            'original_price' => 'sometimes|required|integer|min:0',
            'sale_price'     => 'nullable|integer|min:0',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'level'          => 'nullable|integer|min:0',
            'account_age'    => 'nullable|string|max:255',
            'labels'        => 'nullable|array',
            'labels.*'      => 'exists:labels,id',
        ];
    }

    public function messages()
    {
        return [
            'game_id.required'        => 'Game harus dipilih.',
            'game_id.exists'          => 'Game yang dipilih tidak valid.',
            'account_name.required'   => 'Nama akun wajib diisi.',
            'account_name.string'     => 'Nama akun harus berupa teks.',
            'account_name.max'        => 'Nama akun maksimal 255 karakter.',
            'description.string'      => 'Deskripsi harus berupa teks.',
            'features.string'         => 'Fitur harus berupa teks.',
            'original_price.required' => 'Harga asli wajib diisi.',
            'original_price.integer'  => 'Harga asli harus berupa angka.',
            'original_price.min'      => 'Harga asli tidak boleh negatif.',
            'sale_price.integer'      => 'Harga jual harus berupa angka.',
            'sale_price.min'          => 'Harga jual tidak boleh negatif.',
            'image.image'             => 'File harus berupa gambar.',
            'image.mimes'             => 'Gambar harus berformat jpg, jpeg, png, atau webp.',
            'image.max'               => 'Ukuran gambar maksimal 2MB.',
            'level.integer'           => 'Level harus berupa angka.',
            'level.min'               => 'Level tidak boleh negatif.',
            'account_age.string'      => 'Umur akun harus berupa teks.',
            'account_age.max'         => 'Umur akun maksimal 255 karakter.',
            'labels.array'           => 'Labels harus berupa array.',
            'labels.*.exists'        => 'Label yang dipilih tidak valid.',
        ];
    }
}
