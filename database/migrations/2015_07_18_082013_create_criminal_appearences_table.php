<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriminalAppearencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_appearences', function (Blueprint $table) {
            $table->string('person_id',50);
            $table->string('height');
            $table->string('weight');
            $table->string('hair_colour');
            $table->string('eye_colour');
            $table->string('birth_mark_description1');
            $table->string('birth_mark_description2');
            $table->string('birth_mark_description3');
            $table->string('birth_mark_description4');
            $table->string('birth_mark_description5');

            $table->string('other_description',255);
            $table->foreign('person_id')->references('person_id')->on('personal_infos');
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
        Schema::drop('criminal_appearences');
    }
}
