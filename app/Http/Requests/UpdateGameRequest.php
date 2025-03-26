<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
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
            'developer'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Nama game harus diisi.',
            'name.string'    => 'Nama game harus berupa teks.',
            'name.max'       => 'Nama game tidak boleh lebih dari 255 karakter.',
            'genre.required' => 'Genre game harus diisi.',
            'genre.string'   => 'Genre game harus berupa teks.',
            'genre.max'      => 'Genre game tidak boleh lebih dari 255 karakter.',
            'developer.required' => 'Developer game harus diisi.',
            'developer.string'   => 'Developer game harus berupa teks.',
            'developer.max'      => 'Developer game tidak boleh lebih dari 255 karakter.',
            'image.image'    => 'File yang diunggah harus berupa gambar.',
            'image.mimes'    => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.max'      => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
