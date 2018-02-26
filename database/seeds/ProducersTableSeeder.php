<?php

use Illuminate\Database\Seeder;
use App\Models\Producer;

class ProducersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/* Producer::truncate(); */

		$faker = \Faker\Factory::create();

		for($i=0; $i<5; $i++) {
			$gender = $faker->randomElement($array = array('male', 'female'));
			Producer::create([
				'name' => $faker->name,
				'sex' => $gender,
				'bio' => $faker->sentence,
				'dob' => $faker->date,
			]);
		}
    }
}
