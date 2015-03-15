<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->string('username')->unique();
			$table->string('name')->nullable();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('phone')->nullable();
			$table->enum('sex',['M', 'F'])->nullable();
			$table->date('birthdate')->nullable();
			$table->boolean('is_active')->default(0)->index();
			$table->string('activation_key',32)->nullable();
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
