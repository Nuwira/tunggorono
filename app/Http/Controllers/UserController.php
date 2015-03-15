<?php namespace App\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Models\User;

use Date;
use Format;

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

		$this->auth = $this->data['auth'] = $this->auth = $auth;

		$this->data['sitetitle'] = trans('users.titles.profile');
	}

	/**
	 * Edit user profile form.
	 *
	 * @return Response
	 */
	public function profile()
	{
		$this->data['user'] = $this->auth->user();
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

        $success = [];
        array_push($success, trans('success.profile'));

		if (!empty($input['birthdate']) && $input['birthdate'] != '0000-00-00') {
            $input['birthdate'] = Date::parse($input['birthdate'])->format('Y-m-d');
        } else {
            unset($input['birthdate']);
        }

        if (!empty($input['phone'])) {
            $input['phone'] = Format::phone($input['phone']);
        }

        // Password
        if (!empty($password) && !empty($password2) && $password == $password2) {
            $input['password'] = bcrypt($password);
            array_push($success, trans('success.password'));
        }

        $user = User::find($id);
        $user->fill($input);
        $user->save();

        return redirect('profile')->with('success', $success);
	}

}
