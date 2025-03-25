<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'genre'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Nama game harus diisi.',
            'name.string'      => 'Nama game harus berupa teks.',
            'name.max'         => 'Nama game tidak boleh lebih dari 255 karakter.',
            'genre.required'   => 'Genre game harus diisi.',
            'genre.string'     => 'Genre game harus berupa teks.',
            'genre.max'        => 'Genre game tidak boleh lebih dari 255 karakter.',
            'image.required'   => 'Gambar game harus diunggah.',
            'image.image'      => 'File yang diunggah harus berupa gambar.',
            'image.mimes'      => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.max'        => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
