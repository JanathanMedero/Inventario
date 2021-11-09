<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProduct extends Component
{

    public $existence_matriz    = 0;
    public $existence_virrey    = 0;
    public $existence_general   = 0;
    public $public_price        = 0;
    public $price_2x1           = 0;
    public $pyscom_price        = 0;
    public $gain_2x1            = 0;
    public $normal_gain         = 0;

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
