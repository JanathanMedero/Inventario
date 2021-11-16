<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShowProduct extends Component
{

    public $product;

    public $slug                = '';
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
        'slug'                  => 'required',
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

    public function updateProduct()
    {
        $validatedData = $this->validate();
 
        $product = Product::where('slug', $this->slug)->first();

        $product->update([
            'department'        => $this->department,
            'public_price'      => $this->public_price,
            'dealers'           => $this->dealers,
            'description'       => $this->description,
            'existence_matriz'  => $this->existence_matriz,
            'existence_virrey'  => $this->existence_virrey,
            'existence_general' => $this->existence_general,
            'pyscom_price'      => $this->pyscom_price,
            'model'             => $this->model,
            'sat_key'           => $this->sat_key,
            'sat_description'   => $this->sat_description,
            'price_2x1'         => $this->price_2x1,
            'gain_2x1'          => $this->gain_2x1,
            'normal_gain'       => $this->normal_gain,
        ]);

        return redirect()->route('inventory.index')->with('success', 'Producto creado correctamente');
    }

    public function mount($product)
    {
        $this->department           = $product->department;
        $this->slug                 = $product->slug;
        $this->public_price         = $product->public_price;
        $this->dealers              = $product->dealers;
        $this->description          = $product->description;
        $this->existence_matriz     = $product->existence_matriz;
        $this->existence_virrey     = $product->existence_virrey;
        $this->pyscom_price         = $product->pyscom_price;
        $this->model                = $product->model;
        $this->sat_key              = $product->sat_key;
        $this->sat_description      = $product->sat_description;
        $this->existence_general    = $product->existence_general;
        $this->price_2x1            = $product->price_2x1;
        $this->gain_2x1             = $product->gain_2x1;
        $this->normal_gain          = $product->normal_gain;
    }

    public function render()
    {
        return view('livewire.show-product');
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
