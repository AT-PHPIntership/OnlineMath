<?php

use Illuminate\Database\Seeder;

class LessonsDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
        	DB::table('lessons_details')->insert([
        		'number_lessons' => rand(1, 100),
                'user_id' => rand(1, 20),
                'lesson_id' => rand(1, 20),
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
       	]);
        }
    }
}
