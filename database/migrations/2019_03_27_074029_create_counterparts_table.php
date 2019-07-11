<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterpartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counterparts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('inn')->nullable();
            $table->string('federal_district')->nullable();
            $table->string('city')->nullable();
            $table->string('actual_address')->nullable();
            $table->boolean('clinic_network')->nullable();
            $table->string('clinic_size')->nullable();
            $table->string('clinic_class')->nullable();
            $table->string('specialization')->nullable();
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
        Schema::dropIfExists('counterparts');
    }
}
