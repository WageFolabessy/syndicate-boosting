<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRankTierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'game_rank_category_id' => 'sometimes|required|exists:game_rank_categories,id',
            'tier'                  => 'sometimes|required|string',
            'progress_target'       => 'nullable|string',
            'display_order'         => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'game_rank_category_id.required' => 'Rank category harus dipilih jika diubah.',
            'game_rank_category_id.exists'   => 'Rank category yang dipilih tidak valid.',
            'tier.required'                  => 'Tier harus diisi jika diubah.',
            'tier.string'                    => 'Tier harus berupa teks.',
        ];
    }
}
