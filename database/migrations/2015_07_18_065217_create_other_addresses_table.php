<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_addresses', function (Blueprint $table) {
            $table->string('person_id',50);
            $table->foreign('person_id')->references('person_id')->on('personal_infos');
            $table->string('address',200);
            $table->string('telephone',10);
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
        Schema::drop('other_addresses');
    }
}
