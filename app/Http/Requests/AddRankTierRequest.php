<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRankTierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'game_rank_category_id' => 'required|exists:game_rank_categories,id',
            'tier'                  => 'required|string',
            'progress_target'       => 'nullable|integer|min:0',
            'price'                 => 'nullable|integer|min:0',
            'display_order'         => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'game_rank_category_id.required' => 'Rank category harus dipilih.',
            'game_rank_category_id.exists'   => 'Rank category yang dipilih tidak valid.',
            'tier.required'                  => 'Tier harus diisi.',
            'tier.string'                    => 'Tier harus berupa teks.',
            'progress_target.integer'        => 'Progress target harus berupa angka.',
            'progress_target.min'            => 'Progress target tidak boleh negatif.',
            'price.integer'                  => 'Price harus berupa angka.',
            'price.min'                      => 'Price tidak boleh negatif.',
        ];
    }
}
