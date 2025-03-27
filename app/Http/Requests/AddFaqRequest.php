<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question'  => 'required|string',
            'answer'    => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' => 'Pertanyaan harus diisi.',
            'question.string'   => 'Pertanyaan harus berupa text.',
            'answer.required'   => 'Jawaban harus diisi.',
            'answer.string'     => 'Jawaban harus berupa text.',
        ];
    }
}
