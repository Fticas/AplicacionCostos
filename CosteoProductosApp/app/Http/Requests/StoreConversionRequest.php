<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConversionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'factor' => 'required'
        ];
    }

    /**
     * Shows the validation messages applyed to the request.
     * 
     * @return array<string, mixed>
     */
    public function messages(){
        return [
            'factor.required' => '* El factor es obligatorio',
        ];
    }
}
