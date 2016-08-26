<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
        	DB::table('categories')->insert([
        		'name' => $faker-> word,
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
       	]);
        }
    }
}
