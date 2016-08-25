<?php

use Illuminate\Database\Seeder;

class EntertainmentsTableSeeder extends Seeder
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
        	DB::table('entertainments')->insert([
        		'name' => $faker-> word,
                'description' => $faker->text,
                'time' => rand(1, 10),
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
       	]);
        }
        
    }
}

 