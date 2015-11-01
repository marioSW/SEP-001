<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCaseFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_files', function(Blueprint $table)
        {
            $table->string('file_no');
            $table->string('designated_file_no');
            $table->string('police_station');
            //$table->string('created_date');
            $table->string('resolved_date');
            $table->date('file_created_date');
            $table->string('status');

            $table->primary(array('file_no','police_station'));
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
        Schema::drop('case_files');
    }
}
