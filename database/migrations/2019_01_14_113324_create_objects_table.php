<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_id')->unsigned()->unique();
            $table->integer('city_id')->unsigned()->unique();
	        $table->integer('street_id')->unsigned()->unique();
            $table->string('name');
            $table->timestamps();

	        $table->foreign('year_id')
	              ->references('id')->on('years')
	              ->onDelete('cascade');

	        $table->foreign('city_id')
	              ->references('id')->on('cities')
	              ->onDelete('cascade');

	        $table->foreign('street_id')
	              ->references('id')->on('streets')
	              ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
