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
            $table->string('department')->nullable();
            $table->string('slug');
            $table->string('public_price')->nullable();
            $table->string('dealers')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('existence_matriz')->nullable();
            $table->string('existence_virrey')->nullable();
            $table->string('existence_general')->nullable();
            $table->string('pyscom_price')->nullable();
            $table->string('model')->nullable();
            $table->string('sat_key')->nullable();
            $table->string('sat_description')->nullable();
            $table->string('price_2x1')->nullable();
            $table->string('gain_2x1')->nullable();
            $table->string('normal_gain')->nullable();

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
