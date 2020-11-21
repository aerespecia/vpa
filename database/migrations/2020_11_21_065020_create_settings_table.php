<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('_id');
            $table->string('id')->nullable();
            $table->decimal('agent_commission', 20, 4)->default(0.06);
            $table->decimal('selling_concession', 20, 4)->default(0.01);
            $table->decimal('closing_fees', 20, 4)->default(0.001);
            $table->decimal('taxes', 20, 4)->default(0.001);
            $table->decimal('construction_light', 20, 4)->default(60);
            $table->decimal('construction_medium', 20, 4)->default(120);
            $table->decimal('construction_heavy', 20, 4)->default(180);
            $table->decimal('construction_groundup', 20, 4)->default(300);
            $table->integer('chosen_construction_cost')->default(1);
            $table->decimal('downpayment', 20, 4)->default(0.2);
            $table->decimal('interest_rate', 20, 4)->default(0.1);
            $table->decimal('points', 20, 4)->default(0.04);
            $table->decimal('roi', 20, 4)->default(0.1);
            $table->decimal('hold_time', 20, 4)->default(6); // in months
            $table->string('profile_id')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
