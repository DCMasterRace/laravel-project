<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieCastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if(!Schema::hasTable('movie_cast')) {
			Schema::create('movie_cast', function (Blueprint $table) {
				$table->integer('id');
				$table->integer('movie_id')->unsigned();
				$table->integer('actor_id')->unsigned();
				/* $table->foreign('movie_id')->references('id')->on('movies'); */
				/* $table->foreign('actor_id')->references('id')->on('actors'); */
				$table->timestamps();
				$table->primary('id');
			});
		}
		Schema::table('movie_cast', function($table) {
			$table->foreign('movie_id')->references('id')->on('movies');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_cast');
    }
}
