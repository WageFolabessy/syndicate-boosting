<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddBoostingServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'game_id'       => 'required|exists:games,id',
            'title'   => 'required|string|max:255',
            'description'   => 'nullable|string',
            'original_price' => 'required|integer|min:0',
            'sale_price'    => 'nullable|integer|min:0',
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'labels'        => 'nullable|array',
            'labels.*'      => 'exists:labels,id',
        ];
    }

    public function messages()
    {
        return [
            'game_id.required'       => 'Game harus dipilih.',
            'game_id.exists'         => 'Game yang dipilih tidak valid.',
            'title.required'        => 'Judul akun wajib diisi.',
            'title.string'     => 'Judul akun harus berupa teks.',
            'title.max'        => 'Judul akun maksimal 255 karakter.',
            'original_price.required' => 'Original price harus diisi.',
            'original_price.integer' => 'Original price harus berupa angka.',
            'original_price.min'     => 'Original price minimal 0.',
            'sale_price.integer'     => 'Sale price harus berupa angka.',
            'sale_price.min'         => 'Sale price minimal 0.',
            'image.required'         => 'Image harus diunggah.',
            'image.image'            => 'File harus berupa image.',
            'image.mimes'            => 'Format image harus jpg, jpeg, png, atau webp.',
            'image.max'              => 'Ukuran image maksimal 2MB.',
            'labels.array'           => 'Labels harus berupa array.',
            'labels.*.exists'        => 'Label yang dipilih tidak valid.',
        ];
    }
}
