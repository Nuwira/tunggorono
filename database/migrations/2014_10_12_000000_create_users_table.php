<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('role_id')->unsigned()->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 15)->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->boolean('is_active')->unsigned();
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
        Schema::dropIfExists('users');
    }
}
