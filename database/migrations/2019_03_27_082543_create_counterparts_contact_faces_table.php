<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterpartsContactFacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counterparts_contact_faces', function (Blueprint $table) {
            $table->integer('counterparts_id')->unsigned()->nullable();
            $table->foreign('counterparts_id')
                ->references('id')
                ->on('counterparts');

            $table->integer('contact_faces_id')->unsigned()->nullable();
            $table->foreign('contact_faces_id')
                ->references('id')
                ->on('contact_faces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counterparts_contact_faces');
    }
}
