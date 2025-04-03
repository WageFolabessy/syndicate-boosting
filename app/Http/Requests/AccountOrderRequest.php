<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountOrderRequest extends FormRequest
{
    public function authorize()
    {
        // Ubah sesuai kebutuhan, misalnya true jika user sudah login
        return true;
    }

    public function rules()
    {
        return [
            'game_account_id'  => 'required|exists:game_accounts,id',
            'customer_name'    => 'required|string|max:255',
            'customer_contact' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'game_account_id.required'  => 'Akun game harus dipilih.',
            'game_account_id.exists'    => 'Akun game tidak valid.',
            'customer_name.required'    => 'Nama panggilan wajib diisi.',
            'customer_name.string'      => 'Nama panggilan harus berupa teks.',
            'customer_name.max'         => 'Nama panggilan maksimal 255 karakter.',
            'customer_contact.required' => 'Nomor kontak whatsapp wajib diisi.',
            'customer_contact.string'   => 'Nomor kontak harus berupa teks.',
            'customer_contact.max'      => 'Nomor kontak maksimal 255 karakter.',
        ];
    }
}
