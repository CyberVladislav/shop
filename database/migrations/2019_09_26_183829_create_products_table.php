<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('price');
            $table->string('oldPrice')->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('image');
            $table->string('imageOne')->nullable();
            $table->string('imageTwo')->nullable();
            $table->string('imageThree')->nullable();
            $table->string('imageFour')->nullable();
            $table->string('brand');
            $table->string('IsProductOfWeek');
            $table->string('description');
            $table->string('color');
            $table->string('madeIn');
            $table->string('material');
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
