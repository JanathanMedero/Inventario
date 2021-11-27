<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'description'           => 'required',
            'image'                 => 'image|mimes:jpeg,png,svg,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'department.required' => 'Ingrese el departamento',
            'description.required' => 'Ingrese la descripción del producto',
            'image.max' => 'La imágen debe pesar menos de 2 MB',
        ];
    }
}
