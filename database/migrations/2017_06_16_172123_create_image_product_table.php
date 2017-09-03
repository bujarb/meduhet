<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('image-product', function (Blueprint $table) {
          $table->integer('image_id')->unsigned();
          $table->integer('product_id')->unsigned();

          $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('image_id');
        Schema::dropForeign('product_id');
        Schema::dropIfExists('image-product');
    }
}
