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
            'current_game_rank_category_id'    => 'required|exists:game_rank_categories,id',
            'current_game_rank_tier_id'          => 'required|exists:game_rank_tiers,id',
            'current_game_rank_tier_detail_id'   => 'required|exists:game_rank_tier_details,id',
            'desired_game_rank_category_id'      => 'required|exists:game_rank_categories,id',
            'desired_game_rank_tier_id'            => 'required|exists:game_rank_tiers,id',
            'desired_game_rank_tier_detail_id'     => 'required|exists:game_rank_tier_details,id',
            'server'                             => 'nullable|string|max:255',
            'login'                              => 'nullable|string|max:255',
            'note'                               => 'nullable|string',
            'customer_name'                      => 'required|string|max:255',
            'customer_contact'                   => 'required|string|max:20',
            'username'                           => 'required|string|max:255',
            'password'                           => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'current_game_rank_category_id.required'  => 'Kategori (current) rank harus diisi.',
            'current_game_rank_category_id.exists'      => 'Kategori (current) rank tidak valid.',
            'current_game_rank_tier_id.required'        => 'Tier rank (current) harus diisi.',
            'current_game_rank_tier_id.exists'          => 'Tier rank (current) tidak valid.',
            'current_game_rank_tier_detail_id.required' => 'Detail tier (current) harus diisi.',
            'current_game_rank_tier_detail_id.exists'   => 'Detail tier (current) tidak valid.',
            'desired_game_rank_category_id.required'    => 'Kategori (desired) rank harus diisi.',
            'desired_game_rank_category_id.exists'        => 'Kategori (desired) rank tidak valid.',
            'desired_game_rank_tier_id.required'          => 'Tier rank (desired) harus diisi.',
            'desired_game_rank_tier_id.exists'            => 'Tier rank (desired) tidak valid.',
            'desired_game_rank_tier_detail_id.required'   => 'Detail tier (desired) harus diisi.',
            'desired_game_rank_tier_detail_id.exists'     => 'Detail tier (desired) tidak valid.',
            'server.string'                             => 'Server harus berupa teks.',
            'server.max'                                => 'Server tidak boleh lebih dari 255 karakter.',
            'login.string'                              => 'Login harus berupa teks.',
            'login.max'                                 => 'Login tidak boleh lebih dari 255 karakter.',
            'note.string'                               => 'Catatan harus berupa teks.',
            'customer_name.required'                    => 'Nama pelanggan harus diisi.',
            'customer_name.string'                      => 'Nama pelanggan harus berupa teks.',
            'customer_name.max'                         => 'Nama pelanggan tidak boleh lebih dari 255 karakter.',
            'customer_contact.required'                 => 'Kontak pelanggan harus diisi.',
            'customer_contact.string'                   => 'Kontak pelanggan harus berupa teks.',
            'customer_contact.max'                      => 'Kontak pelanggan tidak boleh lebih dari 20 karakter.',
            'username.required'                         => 'Username harus diisi.',
            'username.string'                           => 'Username harus berupa teks.',
            'username.max'                              => 'Username tidak boleh lebih dari 255 karakter.',
            'password.required'                         => 'Password harus diisi.',
            'password.string'                           => 'Password harus berupa teks.',
            'password.max'                              => 'Password tidak boleh lebih dari 255 karakter.',
        ];
    }
}
