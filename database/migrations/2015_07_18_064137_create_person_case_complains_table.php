<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonCaseComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_case_complains', function (Blueprint $table) {
            $table->string('person_id',50);
            $table->string('file_no',150);
            $table->foreign('person_id')->references('person_id')->on('personal_infos');
            $table->foreign('file_no')->references('file_no')->on('case_files');


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
        Schema::drop('person_case_complains');
    }
}
