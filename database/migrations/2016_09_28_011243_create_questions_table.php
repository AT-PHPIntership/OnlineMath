<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function(Blueprint $table){
            $table->increments('id');
            $table->string('question', 200);
            $table->string('answer', 100);
            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('tests');
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
        Schema::drop('questions');
    }
}
