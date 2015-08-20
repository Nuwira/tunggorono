<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthenticatedController;

use Illuminate\Auth\Guard;

class HomeController extends AuthenticatedController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('dashboard.index')->with($this->data);
	}

}
