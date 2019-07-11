<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteractionHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interaction_history', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('contact_date')->nullable();
            $table->dateTime('next_contact_date')->nullable();
            $table->text('dialogue_type')->nullable();
            $table->text('dialogue_sense')->nullable();
            $table->text('arrangement')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('interaction_history');
    }
}
