<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'transaction_id' => 'required|exists:transactions,id',
            'game_rank_category_id' => 'required|exists:game_rank_categories,id',
            'game_rank_tier_id' => 'required|exists:game_rank_tiers,id',
            'game_rank_tier_detail_id' => 'nullable|exists:game_rank_tier_details,id',

            'server' => 'nullable|string|max:255',
            'login' => 'nullable|string|max:255',
            'note' => 'nullable|string',
            'customer_name' => 'required|string|max:255',
            'customer_contact' => 'required|string|max:20',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
        ];
    }

    /**
     * Pesan error yang akan ditampilkan jika validasi gagal.
     */
    public function messages(): array
    {
        return [
            'transaction_id.required' => 'ID transaksi harus diisi.',
            'transaction_id.exists' => 'ID transaksi tidak valid.',

            'game_rank_category_id.required' => 'Kategori rank harus diisi.',
            'game_rank_category_id.exists' => 'Kategori rank tidak valid.',

            'game_rank_tier_id.required' => 'Tier rank harus diisi.',
            'game_rank_tier_id.exists' => 'Tier rank tidak valid.',

            'game_rank_tier_detail_id.exists' => 'Detail tier rank tidak valid.',

            'server.string' => 'Server harus berupa teks.',
            'server.max' => 'Server tidak boleh lebih dari 255 karakter.',

            'login.string' => 'Login harus berupa teks.',
            'login.max' => 'Login tidak boleh lebih dari 255 karakter.',

            'note.string' => 'Catatan harus berupa teks.',

            'customer_name.required' => 'Nama pelanggan harus diisi.',
            'customer_name.string' => 'Nama pelanggan harus berupa teks.',
            'customer_name.max' => 'Nama pelanggan tidak boleh lebih dari 255 karakter.',

            'customer_contact.required' => 'Kontak pelanggan harus diisi.',
            'customer_contact.string' => 'Kontak pelanggan harus berupa teks.',
            'customer_contact.max' => 'Kontak pelanggan tidak boleh lebih dari 20 karakter.',

            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',

            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.max' => 'Password tidak boleh lebih dari 255 karakter.',

            'price.required' => 'Harga harus diisi.',
            'price.integer' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh kurang dari 0.',
        ];
    }
}
