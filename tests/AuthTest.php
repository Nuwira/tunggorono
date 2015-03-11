<?php

use App\Models\User;
use App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;

class AuthTest extends TestCase
{
    /**
     * Set up for database
     *
     * @return void
     */
	public function setUp()
	{
    	parent::setUp();

        Artisan::call('migrate', ['--seed' => true]);
	}

	/**
	 * A login functional test.
	 *
	 * @return void
	 */
	public function testLogin()
	{
		$response = $this->call('GET', 'auth/login');
		$this->assertEquals(200, $response->getStatusCode());

		$response = $this->call('POST', 'auth/login', ['username' => 'nuwira', 'password' => 'gembira', '_token' => Session::token()]);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedTo('auth/login');
		$this->assertSessionHasErrors();

		$response = $this->call('POST', 'auth/login', ['username' => 'nuwira', 'password' => 'nuwira', '_token' => Session::token()]);

		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedTo('dashboard');
	}

	/**
	 * A login functional test.
	 *
	 * @return void
	 */
	public function testLogout()
	{
		$response = $this->call('GET', 'auth/logout');
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedTo('auth/login');
	}

}
