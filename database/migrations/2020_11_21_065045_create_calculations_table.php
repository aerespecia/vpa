<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->bigIncrements('_id');
            $table->string('id')->nullable();
            $table->decimal('construction_cost',30,4)->default(0);
            $table->decimal('closing_cost',30,4)->default(0);
            $table->decimal('total_estimated_selling_cost',30,4)->default(0);
            $table->decimal('net_proceeds',30,4)->default(0);
            $table->string('profile_id')->nullable();
            $table->string('property_id')->nullable();
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
        Schema::dropIfExists('calculations');
    }
}
