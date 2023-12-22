<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanningRequest extends FormRequest
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
            'planning_monday' => 'required|integer|max:214748',
            'planning_tuesday' => 'required|integer|max:214748',
            'planning_wednesday' => 'required|integer|max:214748',
            'planning_thursday' => 'required|integer|max:214748',
            'planning_friday' => 'required|integer|max:214748',
            'planning_saturday' => 'required|integer|max:214748',
            'planning_sunday' => 'required|integer|max:214748',
            'output_monday' => 'required|integer|max:214748',
            'output_tuesday' => 'required|integer|max:214748',
            'output_wednesday' => 'required|integer|max:214748',
            'output_thursday' => 'required|integer|max:214748',
            'output_friday' => 'required|integer|max:214748',
            'output_saturday' => 'required|integer|max:214748',
            'output_sunday' => 'required|integer|max:214748',
        ];
    }
}
