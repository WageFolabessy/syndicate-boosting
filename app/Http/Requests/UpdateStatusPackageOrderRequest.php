<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusPackageOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status'   => 'sometimes|in:failed,canceled,pending,processed,success',
        ];
    }

    public function messages(): array
    {
        return [
            'status.in'         => 'Status tidak valid.',
        ];
    }
}
