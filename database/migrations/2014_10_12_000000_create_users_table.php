<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->string('role',50);
            $table->string('police_station',60);
			$table->rememberToken();
			$table->timestamps();
		});
        $data=array("name" =>"super admin","email" =>"admin@police.lk","password"=>bcrypt("admin123"),"police_station"=>"Kirulapona","role"=> "admin" );
        User::create($data);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
