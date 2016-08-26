<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call(GroupTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(UsersTestTableSeeder::class);
        $this->call(EntertainmentsTableSeeder::class);
        $this->call(CategoriesLessonsTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(LessonsDetailsTableSeeder::class);
        $this->call(TestsLessonTableSeeder::class);
    }
}
