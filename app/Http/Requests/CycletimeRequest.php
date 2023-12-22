<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CycletimeRequest extends FormRequest
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
            'workweek' => 'required|integer|max:214748',
            'cycletime_monday' => 'required|string|max:255',
            'cycletime_tuesday' => 'required|string|max:255',
            'cycletime_wednesday' => 'required|string|max:255',
            'cycletime_thursday' => 'required|string|max:255',
            'cycletime_friday' => 'required|string|max:255',
            'cycletime_saturday' => 'required|string|max:255',
            'cycletime_sunday' => 'required|string|max:255',
        ];
    }
}
