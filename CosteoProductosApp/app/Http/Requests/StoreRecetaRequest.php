<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecetaRequest extends FormRequest
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required'
        ];
    }

    /**
     * Shows the validation messages applyed to the request.
     * 
     * @return array<string, mixed>
     */
    public function messages(){
        return [
            'nombre.required' => '* El nombre es requerido',
            'descripcion.required' => '* La descripcion es requerida',
            'cantidad.required' => '* La cantidad es requerida'
        ];
    }
}
