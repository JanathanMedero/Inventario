<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
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
            'department'            => 'required',
            'public_price'          => 'required',
            'dealers'               => 'required',
            'description'           => 'required',
            'existence_matriz'      => 'required',
            'existence_virrey'      => 'required',
            'pyscom_price'          => 'required',
            'model'                 => 'required',
            'general_existence'     => 'required',
            'price_2x1'             => 'required',
            'gain_2x1'              => 'required',
            'normal_gain'           => 'required',
        ];
    }

    public function messages()
    {
        return[
            'department.required'       => 'Ingrese el departamento del producto',
            'public_price.required'     => 'Ingrese el precio público',
            'dealers.required'          => 'Ingrese el precio para proveedores',
            'description.required'      => 'Ingrese la descripción del producto',
            'existence_matriz.required' => 'Ingrese las existencias que hay en matriz',
            'existence_virrey.required' => 'Ingrese las existencias que hay en virrey',
            'pyscom_price.required'     => 'Ingrese la inversión de Pyscom',
            'model.required'            => 'Ingrese el modelo del producto',
            'general_existence'         => 'Error al calcular la cantidad total',
            'price_2x1'                 => 'Error al calcular el precio al 2x1',
            'gain_2x1'                  => 'Error al calcular la ganancia al 2x1',
            'normal_gain'               => 'Error al calcular la ganancia normal',
        ];
    }

}
