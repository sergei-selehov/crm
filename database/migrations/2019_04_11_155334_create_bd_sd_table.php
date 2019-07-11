<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBdSdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bd_sd', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('inn')->nullable();
            $table->text('city_name')->nullable();
            $table->text('country')->nullable();
            $table->text('federal_district')->nullable();
            $table->text('region')->nullable();
            $table->text('city')->nullable();
            $table->text('geometry_name')->nullable();
            $table->text('office')->nullable();
            $table->text('post_code')->nullable();
            $table->text('phone_fix')->nullable();
            $table->text('fax')->nullable();
            $table->text('email')->nullable();
            $table->text('website')->nullable();
            $table->text('vkontakte')->nullable();
            $table->text('instagram')->nullable();
            $table->text('lon')->nullable();
            $table->text('lat')->nullable();
            $table->text('subcategory')->nullable();
            $table->text('specialist')->nullable();
            $table->text('phone_specialist')->nullable();
            $table->text('email_specialist')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bd_sd');
    }
}
