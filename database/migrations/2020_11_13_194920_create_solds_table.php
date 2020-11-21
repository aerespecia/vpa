<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable();
            $table->integer('ml_number')->nullable();
            $table->string('city')->nullable();
            $table->date('listing_date')->nullable();
            $table->integer('dom')->nullable();
            $table->integer('zip')->nullable();
            $table->decimal('listing_price',20,4)->nullable();
            $table->decimal('orig_listing_price',20,4)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('square_footage')->nullable();
            $table->integer('year_built')->nullable();
            $table->decimal('price_per_sq_ft',20,4)->nullable();
            $table->decimal('lot_size_sq_ft',20,4)->nullable();
            $table->text('marketing_remarks')->nullable();
            $table->string('idx')->nullable();
            $table->string('publish_to_internet')->nullable();
            $table->string('listing_agent_name')->nullable();
            $table->string('listing_agent_phone1')->nullable();
            $table->string('agent_email_address')->nullable();
            $table->string('listing_office_name')->nullable();
            $table->string('association')->nullable();
            $table->string('street_full_address')->nullable();
            $table->string('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('street_suffix')->nullable();
            $table->string('street_state')->nullable();
            $table->string('area')->nullable();
            $table->string('district')->nullable();
            $table->decimal('selling_price_per_sqft')->nullable();
            $table->decimal('sp_lp')->nullable();
            $table->string('status_date')->nullable();
            $table->string('type')->nullable();
            $table->string('construction')->nullable();
            $table->string('zoning')->nullable();
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
        Schema::dropIfExists('solds');
    }
}
