<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;

use App\Models\User;
use App\Models\Role;

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

	private function addUserTesting()
	{
        $role = new Role;
        $role->name = 'testing';
        $role->save();
        $role->perms()->attach(2);

        $user = new User;
        $user->username = 'testing';
        $user->password = Hash::make('testing');
        $user->email = str_random(8).'@nuwira.co';
        $user->is_active = 1;
        $user->save();

        $user->roles()->attach($role);
	}

	/**
	 * A login functional test.
	 *
	 * @return void
	 */
	public function testLoginLogout()
	{
		// Add testing user without login-web permission
		$this->addUserTesting();

        // Check login page
		$response = $this->call('GET', 'auth/login');
		$this->assertEquals(200, $response->getStatusCode());

        // Login with wrong password
		$response = $this->call('POST', 'auth/login', ['username' => 'nuwira', 'password' => 'gembira', '_token' => Session::token()]);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedTo('auth/login');
		$this->assertSessionHasErrors();

        // Login using user that have no permission
		$response = $this->call('POST', 'auth/login', ['username' => 'testing', 'password' => 'testing', '_token' => Session::token()]);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedTo('auth/login');
		$this->assertSessionHasErrors();

        // Login using right credentials
		$response = $this->call('POST', 'auth/login', ['username' => 'nuwira', 'password' => 'nuwira', '_token' => Session::token()]);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedTo('dashboard');

        // Logout
		$response = $this->call('GET', 'auth/logout');
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedTo('auth/login');
	}

}
