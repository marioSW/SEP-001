<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriminalListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_lists', function (Blueprint $table) {
            $table->string('list_no');
            $table->string('crime_category',200);
            $table->string('crime_type',30);
            $table->string('crime_description',255);
            $table->timestamps();

            $table->primary('list_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('criminal_lists');
    }
}
