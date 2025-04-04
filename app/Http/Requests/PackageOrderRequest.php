<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'boosting_service_id' => 'required|exists:boosting_services,id',
            'server'              => 'nullable|string|max:255',
            'login'               => 'nullable|string|max:255',
            'note'                => 'nullable|string',
            'customer_name'       => 'required|string|max:255',
            'customer_contact'    => 'required|regex:/^[0-9]+$/|max:20',
            'username'            => 'required|string|max:255',
            'password'            => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'boosting_service_id.required' => 'Pilih layanan boosting.',
            'boosting_service_id.exists'   => 'Layanan boosting tidak ditemukan.',
            'server.string'                => 'Server harus berupa teks.',
            'server.max'                   => 'Server tidak boleh lebih dari 255 karakter.',
            'login.string'                 => 'Metode login harus berupa teks.',
            'login.max'                    => 'Metode login tidak boleh lebih dari 255 karakter.',
            'customer_name.required'       => 'Nama pelanggan wajib diisi.',
            'customer_name.max'            => 'Nama pelanggan tidak boleh lebih dari 255 karakter.',
            'customer_contact.required'    => 'Nomor WhatsApp wajib diisi.',
            'customer_contact.regex'       => 'Nomor WhatsApp hanya boleh berisi angka.',
            'customer_contact.max'         => 'Nomor WhatsApp tidak boleh lebih dari 20 karakter.',
            'username.required'            => 'Username/ID Game wajib diisi.',
            'username.max'                 => 'Username/ID Game tidak boleh lebih dari 255 karakter.',
            'password.required'            => 'Password Akun wajib diisi.',
            'password.max'                 => 'Password tidak boleh lebih dari 255 karakter.'
        ];
    }
}
