<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->unsignedInteger('question_id')->foreign()
                ->references('id')->on('questions')
                ->onDelete('cascade');
            $table->timestamps();
        });

        $choice1 = [
            'text' => '1st Choice',
            'question_id' => 2
        ];
        DB::table('choices')->insert($choice1);

        $choice2 = [
            'text' => '2st Choice',
            'question_id' => 2
        ];
        DB::table('choices')->insert($choice2);

        $choice3 = [
            'text' => '1st Choice',
            'question_id' => 3
        ];
        DB::table('choices')->insert($choice3);
        $choice4 = [
            'text' => '2st Choice',
            'question_id' => 3
        ];
        DB::table('choices')->insert($choice4);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('choices');
    }
}
