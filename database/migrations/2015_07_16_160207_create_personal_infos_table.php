<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function(Blueprint $table)
        {
            $table->string('person_id',50);
            $table->string('NIC',10);
            $table->string('file_no',150);
            $table->foreign('file_no')->references('file_no')->on('case_files');
            $table->string('passport_id');
            $table->string('driving_licence_id');
            $table->string('full_name');
            $table->string('surname');
            $table->string('date_of_birth');
            $table->string('sex');
            $table->string('religion');
            $table->string('nationality');
            $table->string('marital_status');
            $table->string('current_address');
            $table->string('telephone');
            $table->string('current_mobile_no');
            $table->string('title');
            $table->timestamps();
            $table->primary('person_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personal_infos');
    }
}
