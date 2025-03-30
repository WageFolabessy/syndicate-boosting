<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRankCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'game_id'       => 'sometimes|required|exists:games,id',
            'name'          => 'sometimes|required|string|max:255',
            'system_type'   => 'sometimes|required|in:star,point',
            'display_order' => 'nullable|integer',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'game_id.required'       => 'Game harus dipilih jika diubah.',
            'game_id.exists'         => 'Game yang dipilih tidak valid.',
            'name.required'          => 'Nama kategori harus diisi jika diubah.',
            'name.string'            => 'Nama kategori harus berupa teks.',
            'name.max'               => 'Nama kategori maksimal 255 karakter.',
            'system_type.required'   => 'Tipe sistem ranking harus dipilih jika diubah.',
            'system_type.in'         => 'Tipe sistem ranking tidak valid.',
            'display_order.integer'  => 'Display order harus berupa angka.',
            'image.image'            => 'File yang diunggah harus berupa gambar.',
            'image.mimes'            => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.max'              => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
