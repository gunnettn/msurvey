<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer')->nullable();
            $table->unsignedInteger('question_id')->foreign()
                ->references('id')->on('questions')
                ->onDelete('cascade');
            $table->unsignedInteger('choice_id')->foreign()
                ->references('id')->on('choices')
                ->onDelete('cascade');
            $table->unsignedInteger('responder_id')->foreign()
                ->references('id')->on('responders')
                ->onDelete('cascade');
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
        Schema::drop('answers');
    }
}
