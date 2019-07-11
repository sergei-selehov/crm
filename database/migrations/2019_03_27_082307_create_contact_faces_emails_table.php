<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactFacesEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_faces_emails', function (Blueprint $table) {
            $table->integer('email_id')->unsigned();
            $table->foreign('email_id')
                ->references('id')
                ->on('emails');

            $table->integer('contact_faces_id')->unsigned();
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
        Schema::dropIfExists('contact_faces_emails');
    }
}
