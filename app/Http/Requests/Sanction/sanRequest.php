<?php

namespace App\Http\Requests\Sanction;

use Illuminate\Foundation\Http\FormRequest;

class sanRequest extends FormRequest
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
        $rules=[
            'financial_year'=>['required','string'],
            'district'=>['required','string'],
            'block'=>['required','string'],
            'gp'=>['required','string'],
            'newGP'=>['required'],
            'sanction_amt'=>['required|regex:/^\d+(\.\d{1,2})?$/'],
            'sanction_date'=>['required','date'],
            'sanction_head'=>['required','string'],
            'sanction_purpose'=>['required','string']
           ];
           return $rules;
    }
}
