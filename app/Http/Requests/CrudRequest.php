<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrudRequest extends FormRequest
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
            'first_name' => 'Required|String|max:255',
            'last_name' => 'Required|String|max:255',
            'contact_number' => 'Required|String|max:255',
            'age' => 'Required|String|max:255',
            'birth_date' => 'Required|String|max:255',
            'address' => 'Required|String|max:255',
        ];
    }
}
