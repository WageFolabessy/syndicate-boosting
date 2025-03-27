<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRankTierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'game_rank_category_id' => 'required|exists:game_rank_categories,id',
            'tier'                  => 'required|string',
            'stars_required'        => 'nullable|integer|min:0',
            'price'                 => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'game_rank_category_id.required' => 'Rank category harus dipilih.',
            'game_rank_category_id.exists'   => 'Rank category yang dipilih tidak valid.',
            'tier.required'                  => 'Tier harus diisi.',
            'stars_required.integer'         => 'Stars required harus berupa angka.',
            'stars_required.min'             => 'Stars required tidak boleh negatif.',
            'price.integer'                  => 'Price harus berupa angka.',
            'price.min'                      => 'Price tidak boleh negatif.',
        ];
    }
}
