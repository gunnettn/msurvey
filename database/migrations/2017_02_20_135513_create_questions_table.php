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
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('type');
            $table->unsignedInteger('section_id')->foreign()
                ->references('id')->on('sections')
                ->onDelete('cascade');
            $table->timestamps();
        });


        $question1 = [
            'title' => '1st Question',
            'type' => 'text',
            'section_id' => 1
        ];
        DB::table('questions')->insert($question1);
        $question2 = [
            'title' => '2nd Question',
            'type' => 'radio',
            'section_id' => 1
        ];
        DB::table('questions')->insert($question2);

        $question3 = [
            'title' => '3rd Question',
            'type' => 'checkbox',
            'section_id' => 2
        ];
        DB::table('questions')->insert($question3);
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
