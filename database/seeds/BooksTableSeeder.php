<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
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
        	DB::table('books')->insert([
        		'category_id' => rand(1, 15),
                'group_id' => rand(1, 5),
                'name' => $faker-> word,
                'description' => $faker->text,
                'author' => $faker->text,
                'test_scores' => rand(1, 10),
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
            ]);
        }
    }
}
