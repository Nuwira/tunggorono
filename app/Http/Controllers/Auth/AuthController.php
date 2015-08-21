<?php namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    /**
	 * The RedirectPath implementation.
	 *
	 * @var RedirectPath
	 */
	protected $redirectPath = 'dashboard';
	
	/**
	 * The RedirectTo implementation.
	 *
	 * @var RedirectTo
	 */
	protected $redirectTo = 'dashboard';
	
	/**
	 * The RedirectAfterLogout implementation.
	 *
	 * @var RedirectAfterLogout
	 */
	protected $redirectAfterLogout = 'auth/login';
	
	/**
	 * Variable used for login.
	 *
	 * @var username
	 */
	protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @param Auth $auth
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}
    
    /**
	 * Authenticate the user.
	 *
	 * @param \Illuminate\Http\Request
	 * @param App\Models\User
	 * @return \Illuminate\Http\Response
	 */
	public function authenticated(Request $request, User $auth)
    {
        //dd($auth->can('login-web'));
        
        if ($auth->can('login-web')) {
            return redirect()->intended($this->redirectPath());
        } else {
            Auth::logout();
            return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/')
                ->withErrors(['permission' => trans('errors.403')]);
        }
    }
    
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        $credentials = $request->only($this->loginUsername(), 'password');
        $credentials['is_active'] = 1;
        
        return $credentials;
    }
}
