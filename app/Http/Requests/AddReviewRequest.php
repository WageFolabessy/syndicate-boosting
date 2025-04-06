<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'transaction_id' => 'required|exists:transactions,id',
            'rating'         => 'required|integer|min:1|max:5',
            'comment'        => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'transaction_id.required' => 'ID transaksi wajib ada.',
            'transaction_id.exists'   => 'Transaksi tidak valid.',
            'rating.required'         => 'Rating wajib diisi.',
            'rating.integer'          => 'Rating harus berupa angka.',
            'rating.min'              => 'Rating minimal 1 bintang.',
            'rating.max'              => 'Rating maksimal 5 bintang.',
        ];
    }
}
