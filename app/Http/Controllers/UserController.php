<?php namespace App\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

use Date;
use Format;

class UserController extends Controller
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
	 * User management.
	 *
	 * @param App\Models\User $user
	 * @param $num
	 * @return Response
	 */
	public function index(User $user)
	{
		$this->data['sitetitle'] = trans('users.titles.management');
		$this->data['users'] = $user->paginate(config('site.num'));
		return view('users.index')->with($this->data);
	}

	/**
	 * Edit user.
	 *
	 * @param $id
	 * @param App\Models\User $user
	 * @param App\Models\Role $role
	 * @return Response
	 */
	public function edit($id, User $user, Role $role)
	{
		$this->data['user'] = $user->find($id);
		$this->data['roles'] = $this->roles($role);
		$this->data['sitetitle'] = trans('users.titles.edit', ['username' => $this->data['user']->username]);
		return view('users.form')->with($this->data);
	}

    /**
	 * Info user.
	 *
	 * @param $id
	 * @param App\Models\User $user
	 * @param App\Models\Role $role
	 * @return Response
	 */
	public function info($id, User $user)
	{
		$this->data['user'] = $user->find($id);
		$this->data['sitetitle'] = trans('users.titles.info', ['username' => $this->data['user']->username]);
		return view('users.info')->with($this->data);
	}
    /**
	 * Add user.
	 *
	 * @param $id
	 * @param App\Models\Role $role
	 * @return Response
	 */
	public function add(Role $role)
	{
		$this->data['roles'] = $this->roles($role);
		$this->data['sitetitle'] = trans('users.titles.add');
		return view('users.form')->with($this->data);
	}

	/**
	 * Edit user profile form.
	 *
	 * @return Response
	 */
	public function profile()
	{
		$this->data['sitetitle'] = trans('users.titles.profile');
		$this->data['user'] = $this->auth->user();
		return view('users.profile')->with($this->data);
	}

	/**
	 * Update user profile.
	 *
	 * @param Illuminate\Http\Request $request
	 * @param Illuminate\Auth\Guard $auth
	 * @return Response
	 */
	public function update(Request $request, Guard $auth)
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

	/**
	 * Role.
	 *
	 * @param App\Models\Role $role
	 * @return Array
	 */
	private function roles(Role $role)
	{
        $array = [];

        $roles = $role->all();
        if (!empty($roles)) {
            foreach ($roles as $r) {
                $array[$r->id] = $r->role;
            }
        }

        return $array;
	}

}
