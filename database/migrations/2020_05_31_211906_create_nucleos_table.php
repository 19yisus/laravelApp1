<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNucleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nucleos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NameNucleo',50);
            $table->longText('address');
            $table->boolean('status');
            $table->string('codePostal',4);
            $table->string('typeNucleo',2);
            $table->integer('codSede')->index()->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('nucleos', function(Blueprint $table){
            $table->foreign('codSede')->references('id')->on('nucleos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nucleos', function(Blueprint $table){
            $table-dropForeign('codSede');
        });

        Schema::drop('nucleos');
    }
}
