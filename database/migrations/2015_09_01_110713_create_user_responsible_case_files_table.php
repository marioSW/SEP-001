<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResponsibleCaseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_responsible_case_files', function (Blueprint $table) {

            $table->string('urcs_id',60);
            $table->integer('person_id')->unsigned()->index();
            $table->string('police_station',60);
            $table->string('case_file_no');
            $table->timestamps();

            $table->foreign('case_file_no')->references('file_no')->on('case_files');

            $table->foreign('person_id')->references('id')->on('users');

            $table->primary('urcs_id');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_responsible_case_files');
    }
}
