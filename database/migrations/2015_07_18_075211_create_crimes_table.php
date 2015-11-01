<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crimes', function (Blueprint $table) {
            $table->string('crime_list_no');
            $table->foreign('crime_list_no')->references('list_no')->on('criminal_lists');
            $table->string('case_file_no');
            $table->foreign('case_file_no')->references('file_no')->on('case_files');
            $table->string('description',255);
            $table->string('case_police_station');
            $table->date('crime_date');
            $table->time('crime_time');
            $table->string('crime_place_name',255);
            $table->string('crime_place_add',255);
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
        Schema::drop('crimes');
    }
}
