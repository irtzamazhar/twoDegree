<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_color')->nullable();
            $table->mediumText('product_desc')->nullable();
            $table->string('product_image');
            $table->string('product_size')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('product_sale_price')->nullable();
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
        Schema::dropIfExists('shop_products');
    }
}
