<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteractionHistoryContactFacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interaction_history_contact_faces', function (Blueprint $table) {
            $table->integer('interaction_history_id')->unsigned()->nullable();
            $table->foreign('interaction_history_id')
                ->references('id')
                ->on('interaction_history');

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
        Schema::dropIfExists('interaction_history_contact_faces');
    }
}
