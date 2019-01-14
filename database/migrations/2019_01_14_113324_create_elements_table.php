<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_id')->unsigned();
            $table->integer('city_id')->unsigned();
	        $table->integer('street_id')->unsigned();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('elements');
        Schema::enableForeignKeyConstraints();
    }
}
