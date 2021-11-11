<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->integer('public_price');
            $table->integer('dealers');
            $table->string('description');
            $table->integer('existence_matriz');
            $table->integer('existence_virrey');
            $table->integer('existence_general');
            $table->integer('pyscom_price');
            $table->string('model');
            $table->string('sat_key')->nullable();
            $table->string('sat_description')->nullable();
            $table->integer('price_2x1');
            $table->integer('gain_2x1');
            $table->integer('normal_gain');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
