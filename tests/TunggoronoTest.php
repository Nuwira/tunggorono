<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;

use App\Models\User;
use App\Models\Role;

use Illuminate\Hashing\BcryptHasher;

class TunggoronoTest extends TestCase
{
    public function __construct()
    {
        $this->username = 'nuwira';
        $this->password = 'nuwira';
    }

    /**
     * Set up for database
     *
     * @return void
     */
	public function setUp()
	{
    	parent::setUp();

        Artisan::call('migrate');
        $this->seed();

        // Add testing user without login-web permission
		$this->addUserTesting();
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
	 * Welcome functional test.
	 *
	 * @return void
	 */
	public function testWelcome()
	{
		$response = $this->call('GET', '/');

		$this->assertResponseStatus(302);
		$this->assertRedirectedTo('auth/login');
	}

	/**
	 * Failed auth functional test.
	 *
	 * @return void
	 */
	public function testFailedAuth()
	{
		// Check login page
		$response = $this->call('GET', 'auth/login');
		$this->assertResponseOk();

        // Login with wrong password
		$response = $this->call('POST', 'auth/login', [
		    'username' => $this->username,
		    'password' => 'gembira',
		    '_token' => Session::token()
        ]);
		$this->assertResponseStatus(302);
		$this->assertRedirectedTo('auth/login');
		$this->assertSessionHasErrors('username');

        // Login using user that have no permission
		$response = $this->call('POST', 'auth/login', [
		    'username' => 'testing',
		    'password' => 'testing',
		    '_token' => Session::token()
        ]);
		$this->assertResponseStatus(302);
		$this->assertRedirectedTo('auth/login');
		$this->assertSessionHasErrors('permission');
    }

    /**
	 * Success auth functional test.
	 *
	 * @return void
	 */
	public function testSuccessAuth()
    {
        // Check login page, to get _token
		$this->login();

        $this->logout();
	}

	/**
	 * Login procedure.
	 *
	 * @return void
	 */
	private function login($username = null, $password = null)
	{
    	$username = (!empty($username) ? $username : $this->username);
    	$password = (!empty($password) ? $password : $this->password);

    	$response = $this->call('GET', 'auth/login');
		$this->assertResponseOk();

        // Login using right credentials
		$response = $this->call('POST', 'auth/login', [
		    'username' => $username,
		    'password' => $password,
		    '_token' => Session::token()
        ]);
		$this->assertResponseStatus(302);
		$this->assertRedirectedTo('dashboard');
	}

	/**
	 * Logout procedure.
	 *
	 * @return void
	 */
	private function logout()
	{
    	// Logout
		$response = $this->call('GET', 'auth/logout');
		$this->assertResponseStatus(302);
		$this->assertRedirectedTo('auth/login');
	}

	/**
	 * Profile functional test.
	 *
	 * @return void
	 */
	public function testProfile()
	{
        $this->login();

        $response = $this->call('GET', 'profile');
        $this->assertResponseOk();

		$rand = str_random(8);

		$response = $this->call('POST', 'user/save', [
		    'id' => '1',
		    'name' => 'Nuwira '.$rand,
		    '_token' => Session::token()
        ]);
		$this->assertResponseStatus(302);
        $this->assertRedirectedTo('profile');

        $response = $this->call('GET', 'profile');
        $this->assertResponseOk();
        $this->assertViewHas('auth');

        $this->logout();
	}

	/**
	 * Change password functional test.
	 *
	 * @return void
	 */
	public function testChangePassword()
	{
        $this->login();

        $response = $this->call('GET', 'profile');
        $this->assertResponseOk();

		$rand = str_random(8);

		$response = $this->call('POST', 'user/save', [
		    'id' => '1',
		    'password' => 'tunggorono',
		    'password2' => 'tunggorono',
		    '_token' => Session::token()
        ]);
		$this->assertResponseStatus(302);
        $this->assertRedirectedTo('profile');

        $response = $this->call('GET', 'profile');
        $this->assertResponseOk();
        $this->assertViewHas('auth');

        $this->logout();

        $this->login('nuwira', 'tunggorono');

        $response = $this->call('GET', 'profile');
        $this->assertResponseOk();

        $this->logout();
	}
}
