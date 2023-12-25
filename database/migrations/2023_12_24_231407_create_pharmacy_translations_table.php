<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('pharmacy_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique(['pharmacy_id', 'locale']);
            $table->foreign('pharmacy_id')->references('id')
                ->on('pharmacies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_translations');
    }
}
