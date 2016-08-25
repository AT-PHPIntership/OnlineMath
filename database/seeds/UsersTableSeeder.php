<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user = new User();
        $user->name = 'Admin';
        $user->username = 'ngatran';
        $user->password = '12345678';
        $user->role_id = 1;
        $user->group_id=1;
        $user->birthday = '03/10/1994';
        $user->gender = 0;
        $user->address = 'Asian Tech Inc';
        $user->save();

        for ($i=0; $i < 50; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'username' => $faker->username,
                'password' => '12345678',
                'role_id' => rand(2, 3),
                'group_id' => rand(1,5),
                'birthday' => $faker->dateTimeBetween('-40 years', '-18 years')->format('d/m/Y'),
                'gender' => rand(0, 1),
                'address' => $faker->address,
                'remember_token' => str_random(60),
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
            ]);
        }
    }
}