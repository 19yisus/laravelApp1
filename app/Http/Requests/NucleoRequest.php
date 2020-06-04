<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NucleoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'NameNucleo' => 'string|max:50|min:3|required', 
            'Address' => 'string|max:250|min:5|required', 
            'CodPostal' => 'integer|min:4|required',
            'typeNucleo' => 'string|min:1|required'
        ];
    }

    public function messages()
    {
        return [
            'NameNucleo.min' => 'El nombre del nucleo es muy corto', 
            'NameNucleo.max' => 'El nombre del nucleo es demasiado largo', 
            'NameNucleo.required' => 'El nombre del nucleo es obligatorio', 
            'address.min' => 'La direccion del nucleo es muy corta', 
            'address.max' => 'La direccion del nucleo es demasiado larga', 
            'address.required' => 'La direccion del nucleo es obligatoria', 
            'CodPostal.min' => 'El codigo postal es muy corto',
            'CodPostal.max' => 'El codito postal es demasiado largo',
            'CodPostal.required' => 'El codigo postal es obligatorio',
            'CodPostal.integer' => 'El codigo postal es numerico',
            'typeNucleo.required' => 'El tipo de nucleo es obligatorio',
            'typeNucleo.string' => 'No has seleccionado ningun tipo de nucleo'
        ];
    }
}
