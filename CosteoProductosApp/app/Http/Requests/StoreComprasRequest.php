<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComprasRequest extends FormRequest
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
            'fecha_compra' => 'required',
            'no_factura' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fecha_compra.required' => '* La fecha es requerida',
            'no_factura.required' => '* El numero de factura es requerido'
        ];
    }
}
