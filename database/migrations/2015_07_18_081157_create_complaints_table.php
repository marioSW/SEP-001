<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->string('complaint_id');
            $table->string('person_complainer_id',50);
            $table->foreign('person_complainer_id')->references('person_id')->on('personal_infos');
            $table->date('complained_date');
            $table->time('complained_time');
            $table->timestamps();
            $table->primary('complaint_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('complaints');
    }
}
