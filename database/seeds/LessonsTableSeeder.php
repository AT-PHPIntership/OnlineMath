<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
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
        	DB::table('lessons')->insert([
        		'name' => $faker-> word,
                'description' => $faker->text,
                'page' => rand(1, 300),
                'index' => rand(1, 6),
                'category_id' => rand(1, 15),
                'group_id' => rand(1, 5),
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
       	]);
        }
    }
}
