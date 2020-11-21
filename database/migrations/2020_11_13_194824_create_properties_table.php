<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('_id');
            $table->string('id')->nullable();
            $table->string('address')->nullable();
            $table->integer('ml_number')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('year_built')->nullable();
            $table->integer('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('street_suffix')->nullable();
            $table->string('state')->nullable();
            $table->string('listing_date')->nullable();
            $table->decimal('area', 20,4)->nullable();
            $table->string('district')->nullable();
            $table->string('apn')->nullable();
            $table->decimal('longitude', 20,4)->nullable();
            $table->decimal('latitude', 20,4)->nullable();
            $table->string('property_type_id')->nullable();
            $table->string('zestimate_id')->nullable();
            $table->string('corelogic_id')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
