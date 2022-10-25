<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
            'descripcion' => 'required'
        ];
    }

    /**
     * Shows the validation messages applyed to the request.
     * 
     * @return array<string, mixed>
     */
    public function messages(){
        return [
            'nombre.required' => '* El nombre del producto es obligatorio',
            'descripcion.required' => '* La descripcion del producto es obligatorio'
        ];
    }
}
