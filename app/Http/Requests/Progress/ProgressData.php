<?php

namespace App\Http\Requests\Progress;

use Illuminate\Foundation\Http\FormRequest;

class ProgressData extends FormRequest
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
        $rules=
        [
            'completion_percentage'=>['required','numeric','regex:/^\d+(\.\d{1,2})?$/'],
            'p_isComplete'=>['required','string'],
            'p_uc'=> ['nullable','file','mimes:pdf','max:2048'],
            'p_image.*'=>['nullable','image','mimes:jpeg,jpg,png','max:400','multiple'],
            'remarks'=>['nullable','string'],
            'sanction_id'=>['required']
        ];  
        return $rules;
    }
}
