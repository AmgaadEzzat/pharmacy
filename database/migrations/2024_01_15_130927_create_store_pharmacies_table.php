<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_pharmacies', function (Blueprint $table) {
            $table->unsignedInteger('pharmacy_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('store_id');
            $table->integer('quantity')->nullable();
            $table->decimal('price')->unsigned();

            $table->primary(['pharmacy_id', 'product_id', 'store_id']);
            $table->foreign('pharmacy_id')->references('id')
                ->on('pharmacies')->onDelete('cascade');
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
        Schema::dropIfExists('store_pharmacies');
    }
}
