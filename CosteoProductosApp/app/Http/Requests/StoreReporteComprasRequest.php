<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReporteComprasRequest extends FormRequest
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
            'fecha_inicio'=>'required',
            'fecha_final'=>'required'
        ];
    }

    /**
     * Shows the validation messages applyed to the request.
     * 
     * @return array<string, mixed>
     */
    public function messages(){
        return [
            'fecha_inicio.required' => 'Debe ingresar la fecha de inicio',
            'fecha_final.required' => 'Debe ingresar la fecha final'
        ];
    }
}
