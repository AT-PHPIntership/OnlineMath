<?php

use Illuminate\Database\Seeder;

class TestsLessonTableSeeder extends Seeder
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
        	DB::table('tests_lessons')->insert([
        		'lesson_id' => rand(1, 15),
                'name' => $faker-> word,
                'number_quenstion' => $faker->text,
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
       	]);
        }
    }
}
