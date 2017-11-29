<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // countries  table
        Schema::create('countries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('country_name');
            $table->integer('population');
            $table->float('area');
            $table->string('main_lang');
            $table->string('currency');
            $table->string('prefix');
            $table->integer('number_length');
            $table->timestamps();
            $table->unique(['country_name','prefix']);
        });

        // states table

        Schema::create('states', function (Blueprint $table){
            $table->increments('id');
            $table->string('state_name');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->unique('state_name');
        });

        // cities table
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_name');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->unique('city_name');
        });

        /*
         *
         *    Schema::create('translations_states', function (Blueprint $table){
            $table->increments('id');
            $table->string('translated_to');
            $table->string('trans_lang');
            $table->string('source_type');
            $table->integer('source_id')->unsigned();
            $table->foreign('source_id','translations_country_id_foreign')->references('id')->on('countries');
            $table->foreign('source_id','translations_state_id_foreign')->references('id')->on('states');
            $table->foreign('source_id','translations_city_id_foreign')->references('id')->on('cities');
            $table->timestamps();
        });
         */

        // translation tables

        Schema::create('translations_countries', function (Blueprint $table){
            $table->increments('id');
            $table->string('translated_to');
            $table->string('trans_lang');
            $table->integer('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->unique('translated_to');
        });

        Schema::create('translations_states', function (Blueprint $table){
            $table->increments('id');
            $table->string('translated_to');
            $table->string('trans_lang');
            $table->integer('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->unique('translated_to');
        });


        Schema::create('translations_cities', function (Blueprint $table){
            $table->increments('id');
            $table->string('translated_to');
            $table->string('trans_lang');
            $table->integer('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->unique('translated_to');
        });

        Schema::create('country_number_perfixs',function (Blueprint $table){
            $table->increments('id');
            $table->string('num_perfix');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->unique('num_perfix');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('states');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('translations_countries');
        Schema::dropIfExists('translations_states');
        Schema::dropIfExists('translations_cities');
        Schema::dropIfExists('country_number_perfixs');
    }
}
