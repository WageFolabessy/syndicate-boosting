<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRankTierDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'game_rank_tier_id' => 'sometimes|required|exists:game_rank_tiers,id',
            'star_number'       => 'sometimes|required|integer|min:1',
            'price'             => 'nullable|integer|min:0',
            'display_order'     => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'game_rank_tier_id.required' => 'Tier harus dipilih jika diubah.',
            'game_rank_tier_id.exists'   => 'Tier yang dipilih tidak valid.',
            'star_number.required'       => 'Nomor bintang harus diisi jika diubah.',
            'star_number.integer'        => 'Nomor bintang harus berupa angka.',
            'star_number.min'            => 'Nomor bintang minimal adalah 1.',
            'price.integer'              => 'Harga harus berupa angka.',
            'price.min'                  => 'Harga tidak boleh negatif.',
            'display_order.integer'      => 'Display order harus berupa angka.',
        ];
    }
}
