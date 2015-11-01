<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGcrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gcrs', function(Blueprint $table)
        {
            $table->string('gcr_id',150);
            $table->string('police_station',150);
            $table->primary(array('gcr_id', 'police_station'));
            $table->string('case_no',150);
            $table->foreign('case_no')->references('file_no')->on('case_files');
            $table->string('status',30);
            $table->timestamps();

        });
        //DB::unprepared('ALTER TABLE `gcrs` DROP PRIMARY KEY, ADD PRIMARY KEY (  `gcr_id` ,`police_station` )');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gcrs');
    }
}
