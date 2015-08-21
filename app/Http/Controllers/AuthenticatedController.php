<?php namespace App\Http\Controllers;
    
use Illuminate\Auth\Guard;
use App\Http\Controllers\Controller as BaseController;

abstract class AuthenticatedController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Authenticated Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @param Illuminate\Auth\Guard $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->middleware('permission');

		$this->auth = $this->data['auth'] = $auth;
		
		$this->env = $this->data['env'] = getenv('APP_ENV');
	}

}
