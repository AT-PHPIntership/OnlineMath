<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 20);
            $table->string('description', 200);
            $table->string('author', 50);
            $table->integer('test_scores')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('class');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::drop('books');
    }
}