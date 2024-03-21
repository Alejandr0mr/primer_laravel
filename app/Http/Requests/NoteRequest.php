<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El título es requerido',
            'title.min' => 'El título debe tener más de 3 caracteres.',
            'description.required' => 'La descripción es necesaria.'
        ];
    }
}
