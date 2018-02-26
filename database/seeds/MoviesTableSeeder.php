<?php

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/* Movie::truncate(); */

		$faker = \Faker\Factory::create();

		for($i=0; $i<10; $i++) {
			Movie::create([
				'name' => $faker->sentence,
				'year_release' => $faker->date,
				'plot' => $faker->sentence,
				'poster' => 'pic'.$i,
			]);
		}
    }
}
