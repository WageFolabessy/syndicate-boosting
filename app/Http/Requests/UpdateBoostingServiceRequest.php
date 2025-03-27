<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBoostingServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'game_id'       => 'sometimes|required|exists:games,id',
            'service_type'  => 'sometimes|required|in:custom,package',
            'description'   => 'nullable|string',
            'original_price'=> 'sometimes|required|integer|min:0',
            'sale_price'    => 'nullable|integer|min:0',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'game_id.required'       => 'Game harus dipilih jika diubah.',
            'game_id.exists'         => 'Game yang dipilih tidak valid.',
            'service_type.required'  => 'Service type harus diisi jika diubah.',
            'service_type.in'        => 'Service type harus custom atau package.',
            'original_price.required'=> 'Original price harus diisi jika diubah.',
            'original_price.integer' => 'Original price harus berupa angka.',
            'original_price.min'     => 'Original price minimal 0.',
            'sale_price.integer'     => 'Sale price harus berupa angka.',
            'sale_price.min'         => 'Sale price minimal 0.',
            'image.image'            => 'File harus berupa image.',
            'image.mimes'            => 'Format image harus jpg, jpeg, png, atau webp.',
            'image.max'              => 'Ukuran image maksimal 2MB.',
        ];
    }
}
