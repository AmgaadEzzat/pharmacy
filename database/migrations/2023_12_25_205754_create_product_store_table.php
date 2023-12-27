<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_store', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('quantity')->nullable();
            $table->decimal('price');

            $table->primary(['product_id', 'store_id']);
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');
            $table->foreign('store_id')->references('id')
                ->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_store');
    }
}
