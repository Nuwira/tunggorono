<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
	use DatabaseMigrations;
	
	/**
	 * A login functional test.
	 *
	 * @return void
	 */
	public function testLogin()
	{
		$this->artisan('db:seed');
		
		$this->visit('/')
		    ->seePageIs('auth/login')
		    ->type('nuwira', 'username')
		    ->type('nuwira', 'password')
		    ->press('Login')
		    ->seePageIs('dashboard');
	}

}
