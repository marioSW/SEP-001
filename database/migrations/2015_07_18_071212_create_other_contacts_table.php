<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_contacts', function (Blueprint $table) {
            $table->string('person_id',50);
            $table->foreign('person_id')->references('person_id')->on('personal_infos');
            $table->string('mobile_no',10);
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
        Schema::drop('other_contacts');
    }
}
