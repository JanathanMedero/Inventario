<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = "sku";

    protected $fillable = ['department', 'slug', 'public_price', 'dealers', 'description', 'existence_matriz', 'existence_virrey', 'pyscom_price', 'model', 'existence_general', 'price_2x1', 'gain_2x1', 'normal_gain'];
}
