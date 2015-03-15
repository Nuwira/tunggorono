<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
	 * The RedirectPath implementation.
	 *
	 * @var RedirectPath
	 */
	protected $redirectPath;


	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->redirectPath = 'dashboard';

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login')->with(['auth' => $this->auth]);
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'username' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('username', 'password');
		$credentials['is_active'] = 1;

		if ($this->auth->attempt($credentials, $request->has('remember'))) {
    		if ($this->auth->user()->can('login-web')) {
                return redirect()->intended($this->redirectPath());
    		} else {
                $this->auth->logout();
                return redirect()->guest($this->loginPath())->withErrors(['permission' => trans('errors.403')]);
    		}
		}

		return redirect($this->loginPath())
    		->withInput($request->only('username', 'remember'))
    		->withErrors([
    			'username' => $this->getFailedLoginMessage(),
    		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect($this->loginPath())->with(['success' => 'Successfully logged out.']);
	}

}
