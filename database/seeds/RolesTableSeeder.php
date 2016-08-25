<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Role::create([
            'name' => 'Admin',
            'created_at' => $faker->dateTimeThisDecade('now')
        ]);
        Role::create([
            'name' => 'user',
            'created_at' => $faker->dateTimeThisDecade('now')
        ]);
        Role::create([
            'name' => 'customer',
            'created_at' => $faker->dateTimeThisDecade('now')
        ]);
          
    }
}
