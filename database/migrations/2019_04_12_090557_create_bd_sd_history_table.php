<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBdSdHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bd_sd_history', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('contact_date')->nullable();
            $table->dateTime('next_contact_date')->nullable();
            $table->text('dialogue_type')->nullable();
            $table->text('dialogue_sense')->nullable();
            $table->text('arrangement')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bd_sd_history');
    }
}
