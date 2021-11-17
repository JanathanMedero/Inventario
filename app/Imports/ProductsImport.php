<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'department'        => $row[0],
            'slug'              => Str::random(25),
            'description'       => $row[1],
            'public_price'      => $row[2],
            'dealers'           => $row[3],
            'existence_matriz'  => $row[4],
            'existence_virrey'  => $row[5],
            'existence_general' => $row[6],
            'pyscom_price'      => $row[7],
            'normal_gain'       => $row[8],
            'gain_2x1'          => $row[9],
            'price_2x1'         => $row[10],
            'model'             => $row[11],
            'sat_key'           => $row[12],
            'sat_description'   => $row[13],
        ]);
    }
}
