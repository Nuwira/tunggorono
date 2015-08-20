<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Models\User;

class TunggoronoBaseTest extends TestCase
{
	use DatabaseMigrations;
	
	public function __construct()
	{
    	parent::__construct();
    	
    	$this->username = 'nuwira';
    	$this->password = 'nuwira';
	}
	
	/**
	 * A login and logout functional test.
	 *
	 * @return void
	 */
	public function testLoginLogout()
	{
		$this->artisan('db:seed');
		
		// Login
		$this->login();
        
        // Logout
        $this->logout();
        
        // Login
		$this->login();
        
        // Logout
        $this->logout();
	}
	
	/**
	 * Edit profile functional test.
	 *
	 * @return void
	 */
	public function testProfile()
	{
		$this->artisan('db:seed');
		
		$user = factory(User::class)->make();
		$name = $user->name;
		$email = $user->email;
		$password = $user->password;
		
		// Login
		$this->login();
		    
        // Edit Profile
        $this->click('Edit Profile')
		    ->seePageIs('profile')
		    ->type($name, 'name')
		    ->type($email, 'email')
		    ->press(trans('buttons.update'))
		    ->seePageIs('profile')
		    ->see(trans('success.profile'));
		    
		// Change Password
		$this->type($password, 'password')
		    ->type($password, 'password_confirmation')
		    ->press(trans('buttons.update'))
		    ->seePageIs('profile')
		    ->see(trans('success.password'));
		    
		// Change wrong password
		$this->type($password, 'password')
		    ->press(trans('buttons.update'))
		    ->seePageIs('profile')
		    ->see(trans('validation.confirmed', ['attribute' => 'password']));
		    
        // Logout
        $this->logout();
        
        // Login using old password
        $this->visit('/')
		    ->seePageIs('auth/login')
		    ->type($this->username, 'username')
		    ->type($this->password, 'password')
		    ->press(trans('buttons.login'))
		    ->seePageIs('auth/login');
        
        // Login with new password
        $this->login($this->username, $password);
        $this->logout();
	}
	
	/**
	 * Edit profile functional test.
	 *
	 * @return void
	 */
	public function testUser()
	{
		$this->artisan('db:seed');
		
		$this->login();
		
		$sex = ['M', 'F'];
		
		$user = factory(User::class)->make();
		$username = $user->username;
		$password = $user->password;
		
		// List user
		$this->visit('users')
		    ->see($this->username);
        
        // Add User
		$this->click(trans('users.titles.add'))
		    ->seePageIs('user/add')
		    ->type($username, 'username')
		    ->type($user->name, 'name')
		    ->type($user->email, 'email')
		    ->type($user->birthdate, 'birthdate')
		    ->select('2', 'role')
		    ->select($user->sex, 'sex')
		    ->type($password, 'password')
		    ->type($password, 'password_confirmation')
		    ->select('1', 'is_active')
		    ->press(trans('buttons.save'))
		    ->seePageIs('user/edit/2')
		    ->see(trans('success.user', ['username' => $username]))
		    ->type($user->name, 'name')
		    ->press(trans('buttons.save'))
		    ->seePageIs('user/edit/2');
        
        // Check user
        $this->click(trans('users.titles.management'))
            ->seePageIs('users')
            ->see($username);
        
        // Check database
        $this->seeInDatabase('users', ['username' => $username]);
		
		$this->logout();
		
		// Login using new user
		$this->login($username, $password);
		$this->logout();
    }
	
	/**
	 * Login routine functional test.
	 *
	 * @return void
	 */
	private function login($username = null, $password = null)
	{
    	$username = (!empty($username) ? $username : $this->username);
    	$password = (!empty($password) ? $password : $this->password);
    	
    	$this->visit('/')
		    ->seePageIs('auth/login')
		    ->type($username, 'username')
		    ->type($password, 'password')
		    ->press(trans('buttons.login'))
		    ->seePageIs('dashboard');
	}
	
	/**
	 * Logout routine functional test.
	 *
	 * @return void
	 */
	private function logout()
	{
    	$this->click(trans('buttons.logout'))
		    ->seePageIs('auth/login');
	}

}
