<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertySumamariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_summaries', function (Blueprint $table) {
            $table->bigIncrements('_id');
            $table->string('id')->nullable();
            $table->string('property_id')->nullable();
            $table->string('zestimate_id')->nullable();
            $table->string('property_price_id')->nullable();
            $table->string('price_id')->nullable();
            $table->string('rz_id')->nullable();
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
        Schema::dropIfExists('property_summaries');
    }
}
