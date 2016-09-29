<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
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
        DB::table('questions')->insert([
              'test_id' => rand(1, 15),
              'question'=>rand(1,15),
              'answer' => rand(1, 15),
              'created_at' => $faker->dateTimeThisDecade($max = 'now')
      ]);
      }
    }
}
