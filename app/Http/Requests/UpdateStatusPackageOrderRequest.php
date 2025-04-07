<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateStatusPackageOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
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
