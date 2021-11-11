<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{

    public $department          = '';
    public $dealers             = 0;
    public $description         = '';
    public $existence_matriz    = 0;
    public $existence_virrey    = 0;
    public $existence_general   = 0;
    public $model               = '';
    public $sat_key             = '';
    public $sat_description     = '';
    public $public_price        = 0;
    public $price_2x1           = 0;
    public $pyscom_price        = 0;
    public $gain_2x1            = 0;
    public $normal_gain         = 0;

    protected $rules = [
        'department'            => 'required',
        'public_price'          => 'required',
        'dealers'               => 'required',
        'description'           => 'required',
        'existence_matriz'      => 'required',
        'existence_virrey'      => 'required',
        'pyscom_price'          => 'required',
        'model'                 => 'required',
        'existence_general'     => 'required',
        'price_2x1'             => 'required',
        'gain_2x1'              => 'required',
        'normal_gain'           => 'required',
    ];

    protected $messages = [
        'department.required'               => 'Ingrese el departamento del producto',
        'public_price.required'             => 'Ingrese el precio público',
        'dealers.required'                  => 'Ingrese el precio para proveedores',
        'description.required'              => 'Ingrese la descripción del producto',
        'existence_matriz.required'         => 'Ingrese las existencias que hay en matriz',
        'existence_virrey.required'         => 'Ingrese las existencias que hay en virrey',
        'pyscom_price.required'             => 'Ingrese la inversión de Pyscom',
        'model.required'                    => 'Ingrese el modelo del producto',
        'existence_general.required'        => 'Error al calcular la cantidad total',
        'price_2x1.required'                => 'Error al calcular el precio al 2x1',
        'gain_2x1.required'                 => 'Error al calcular la ganancia al 2x1',
        'normal_gain.required'              => 'Error al calcular la ganancia normal',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function saveProduct()
    {
        $validatedData = $this->validate();
 
        Product::create($validatedData);

        return redirect()->route('inventory.index')->with('success', 'Producto creado correctamente');
    }

    public function render()
    {
        return view('livewire.create-product');
    }

    public function changeMatriz($value)
    {

        if ( $value == "" || $value < 0 ){
            $this->existence_matriz = 0;
        }

        $general = ($this->existence_matriz + $this->existence_virrey);

        $this->existence_general = $general;
    }

    public function changeVirrey($value)
    {

        if ( $value == "" || $value < 0 ){
            $this->existence_virrey = 0;
        }

        $general = ($this->existence_matriz + $this->existence_virrey);

        $this->existence_general = $general;
    }

    public function changePricePublic($value)
    {
        if ( $value == "" || $value < 0 ){
            $this->public_price = 0;
        }

        $price = ($this->public_price / 2);

        $this->price_2x1 = $price;



        if ( $this->public_price > 0 &&  $this->pyscom_price > 0)
        {
            $price = $this->pyscom_price * 2;

            $total = ($this->public_price - $price);

            $this->gain_2x1 = $total;

            $this->normal_gain = ($this->public_price - $this->pyscom_price);
        }

        if ( $this->public_price == 0)
        {
            $this->gain_2x1 = 0;

            $this->normal_gain = 0;
        }


    }

    public function changePyscomPrice($value)
    {
        if ( $value == "" || $value < 0 || $value == 0 ){
            $this->pyscom_price = 0;
        }else{
            $total = ($value * 1.16 + 10);

            $this->pyscom_price = $total;
        }

        if ( $this->public_price > 0 &&  $this->pyscom_price > 0)
        {

            $price = $this->pyscom_price * 2;

            $total = ($this->public_price - $price);

            $this->gain_2x1 = $total;

            $this->normal_gain = ($this->public_price - $this->pyscom_price);
        }

        if ( $this->pyscom_price == 0)
        {
            $this->gain_2x1 = 0;

            $this->normal_gain = 0;
        }

    }

}
