<?php

use Illuminate\Database\Seeder;

class UsersTestTableSeeder extends Seeder
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
        	DB::table('users_tests')->insert([
        		'user_id' => rand(1, 15),
                'test_id' => rand(1, 15),
                'answer' => rand(1, 15),
                'test_scores' => rand(1, 10),
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
       	]);
        }
    }
}
