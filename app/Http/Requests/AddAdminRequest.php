<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name'         => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password'     => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nama wajib diisi.',
            'name.max'              => 'Nama tidak boleh lebih dari 50 karakter.',
            'email.required'        => 'email wajib diisi.',
            'email.unique'          => 'email sudah terdaftar, gunakan email lain.',
            'password.required'     => 'Password wajib diisi.',
            'password.min'          => 'Password harus minimal 8 karakter.',
            'password.confirmed'    => 'Konfirmasi password tidak cocok.',
        ];
    }
}
