<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonCaseSuspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_case_suspects', function (Blueprint $table) {
            $table->string('person_id');
            $table->string('file_no');
            $table->foreign('file_no')->references('file_no')->on('case_files');
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
        Schema::drop('person_case_suspects');
    }
}
