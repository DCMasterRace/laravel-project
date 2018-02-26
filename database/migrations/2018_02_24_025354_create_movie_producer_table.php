<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieProducerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if(!Schema::hasTable('movie_producer')) {
			Schema::create('movie_producer', function (Blueprint $table) {
				$table->integer('id');
				$table->integer('movie_id')->unsigned();
				$table->integer('prod_id')->unsigned();
				$table->foreign('movie_id')->references('id')->on('movies');
				$table->foreign('prod_id')->references('id')->on('producers');
				$table->timestamps();
				$table->primary('id');
			});
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies_producer');
    }
}
