<?php

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/* Actor::truncate(); */

		$faker = \Faker\Factory::create();

		for($i=0; $i<50; $i++) {
			$gender = $faker->randomElement($array = array('male', 'female'));
			Actor::create([
				'name' => $faker->name,
				'sex' => $gender,
				'dob' => $faker->date,
				'bio' => $faker->sentence,
			]);
		}
    }
}
