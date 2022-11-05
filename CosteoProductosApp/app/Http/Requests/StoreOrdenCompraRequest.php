<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrdenCompraRequest extends FormRequest
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
            'cantidad' => 'required',
            'costo_total' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cantidad.required' => '* Es requerido',
            'costo_total.required' => '* El precio es requerido'
        ];
    }
}
