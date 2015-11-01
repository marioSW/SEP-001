<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupations', function (Blueprint $table) {
            $table->string('person_id',50);
            $table->foreign('person_id')->references('person_id')->on('personal_infos');
            $table->string('work_place_name',150);
            $table->string('job_title',30);
            $table->string('work_place_add',150);
            $table->string('work_place_contact',10);
            $table->string('fax',10);
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
        Schema::drop('occupations');
    }
}
