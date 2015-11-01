<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonAccusedFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_accused_families', function (Blueprint $table) {
            $table->string('person_id',50);
            $table->foreign('person_id')->references('person_id')->on('personal_infos');
            $table->string('name_of_member',50);
            $table->string('surname_of_member',100);
            $table->string('telephone_no',10);
            $table->string('family_status',30);

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
        Schema::drop('person_accused_families');
    }
}
