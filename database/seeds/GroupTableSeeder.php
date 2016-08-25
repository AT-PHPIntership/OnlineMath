<?php
use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
         
        $group = new Group();
        $group->name = 'Lop 1';
        $group->number_students = 2;
        $group->save();
        
        $group = new Group();
        $group->name = 'Lop 2';
        $group->number_students = 3;
        $group->save();

        for($i = 0; $i < 100; $i++){
        	DB::table('groups')->insert([
        		'name' => $faker-> word,
                'number_students' => rand(1, 100), 
                'created_at' => $faker->dateTimeThisDecade($max = 'now')
       	]);
        }
    }
}
