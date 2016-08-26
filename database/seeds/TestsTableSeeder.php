<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();

        for($i = 0; $i < 100; $i++){
        	DB::table('tests')->insert([
        		'group_id' => rand(1, 15),
                'name' => $faker-> word,
                'number_questions' => $faker->text,
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
       	]);
        }
    }
}
