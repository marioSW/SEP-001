<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrimeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_lists', function (Blueprint $table) {
            $table->string('list_no',50);
            $table->string('crime_type',150);
            $table->string('crime_description',255);
            $table->string('crime_category',150);
            $table->timestamps();
        });
		$table->primary('list_no');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('crime_lists');
    }
}
