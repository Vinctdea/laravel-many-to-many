<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:100',
            'processing_time' => 'integer|max:30|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'il titolo è obbligatorio',
            'title.max' => 'il titolo può avere massimo :max caratteri',
            'content.max' => 'il contenuto può avere massimo :max caratteri',
            'content.required' => 'il contenuto è obbligatorio',

            'content.min' => 'il contenuto deve avere almeno :min caratteri',
            'processing_time.min' => 'il tempo di realizzazione deve essere almeno :min settimana',
            'processing_time.max' => 'il tempo di realizzazione può essere  :max settimane',
            'processing_time.integer' => 'il tempo di realizzazione deve essere un numero',

        ];
    }
}
