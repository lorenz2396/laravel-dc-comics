<?php

namespace App\Http\Requests\Comic;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:70',
            'description' => 'required',
            'thumb' => 'nullable|max:2048',
            'price' => 'required|max:70',
            'series' => 'nullabale|max:64',
            'sale_date' => 'nullabale|date',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo non può essere più lungo di 70 caratteri'
        ];
    }
}
