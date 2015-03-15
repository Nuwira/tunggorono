<?php namespace App\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends HomeController
{
	/**
	 * Variable used to hold data in view.
	 *
	 * @var array
	 */
	public $data = [];

	/**
	 * Create a new controller instance.
	 *
	 * @param Illuminate\Auth\Guard $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->middleware('auth');
        $this->middleware('permission');

		$this->auth = $this->data['auth'] = $auth;
	}

	/**
	 * Edit user profile form.
	 *
	 * @return Response
	 */
	public function profile()
	{
		return view('users.form')->with($this->data);
	}

	/**
	 * Save user profile.
	 *
	 * @param Illuminate\Http\Request $request
	 * @param Illuminate\Auth\Guard $auth
	 * @return Response
	 */
	public function save(Request $request, Guard $auth)
	{
        $input = $request->except(['_token', 'q', 'id', 'password', 'password2']);
        $id = $auth->id();

        $password = $request->get('password');
        $password2 = $request->get('password2');

        // Password
        if (!empty($password) && !empty($password2) && $password == $password2) {
            $input['password'] = bcrypt($password);
        }

        $user = User::find($id);
        $user->fill($input);
        $user->save();

		return redirect('profile');
	}

}
