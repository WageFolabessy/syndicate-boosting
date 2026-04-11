<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateGameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'genre'         => 'required|string|max:255',
            'developer'     => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'login_methods' => 'required|array|min:1',
            'login_methods.*' => 'string|max:100',
            'servers'       => 'required|array|min:1',
            'servers.*'     => 'string|max:100',
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
            'login_methods.required' => 'Setidaknya satu metode login harus ditambahkan.',
            'login_methods.min'      => 'Setidaknya satu metode login harus ditambahkan.',
            'servers.required'       => 'Setidaknya satu server harus ditambahkan.',
            'servers.min'            => 'Setidaknya satu server harus ditambahkan.',
        ];
    }
}
