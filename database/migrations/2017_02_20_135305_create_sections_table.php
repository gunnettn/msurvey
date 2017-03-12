<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('survey_id')->foreign()
                ->references('id')->on('surveys')
                ->onDelete('cascade');
            $table->timestamps();
        });


        $section = [
            'name' => '1st Section',
            'survey_id' => 1
        ];
        DB::table('sections')->insert($section);

        $section2 = [
            'name' => '2st Section',
            'survey_id' => 1
        ];
        DB::table('sections')->insert($section2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sections');
    }
}
