<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function(Blueprint $table){
            $table->increments('id');
             $table->string('name', 20);
             $table->string('description', 200);
            $table->integer('page')->unsigned();
             $table->integer('index')->unsigned();
             $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('class');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories_lessons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lessons');
    }
}