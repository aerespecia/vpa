<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_properties', function (Blueprint $table) {
            $table->bigIncrements('_id');
            $table->string('id')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('property_id')->nullable();
            $table->text('marketing_remarks')->nullable();
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
        Schema::dropIfExists('seller_properties');
    }
}
