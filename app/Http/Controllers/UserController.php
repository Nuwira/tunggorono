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
	 * @param App\Models\User $user
	 * @param App\Models\Role $role
	 * @return void
	 */
	public function __construct(Guard $auth, User $user, Role $role)
	{
		$this->middleware('auth');
        $this->middleware('permission');

		$this->auth = $this->data['auth'] = $auth;
		$this->user = $user;
		$this->role = $role;
	}

	/**
	 * User management.
	 *
	 * @param Illuminate\Http\Request $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$search = $this->data['search'] = $request->get('search');

		$users = $this->user;
		if (!empty($search)) {
    		$users->where(function($query) use ($search) {
                $search = '%'.str_slug($search,'%').'%';
                $query->where('username', 'like', $search);
                $query->orWhere('name', 'like', $search);
                $query->orWhere('email', 'like', $search);
    		});
    	}

		$this->data['sitetitle'] = trans('users.titles.management');
		$this->data['users'] = $users->paginate(config('site.num'));
		return view('users.index')->with($this->data);
	}

	/**
	 * Edit user.
	 *
	 * @param $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['user'] = $this->user->find($id);
		$this->data['roles'] = $this->roles();
		$this->data['sitetitle'] = trans('users.titles.edit', ['username' => $this->data['user']->username]);
		return view('users.form')->with($this->data);
	}

    /**
	 * Info user.
	 *
	 * @param $id
	 * @return Response
	 */
	public function info($id)
	{
		$this->data['user'] = $this->user->find($id);
		$this->data['sitetitle'] = trans('users.titles.info', ['username' => $this->data['user']->username]);
		return view('users.info')->with($this->data);
	}
    /**
	 * Add user.
	 *
	 * @return Response
	 */
	public function add()
	{
		$this->data['roles'] = $this->roles();
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
	 * @return Response
	 */
	public function update(Request $request)
	{
        $input = $request->except(['_token', 'q', 'id', 'password', 'password2']);
        $id = $this->auth->id();

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

        $user = $this->user->find($id);
        $user->fill($input);
        $user->save();

        return redirect('profile')->with('success', $success);
	}

	/**
	 * Save user profile.
	 *
	 * @param Illuminate\Http\Request $request
	 * @return Response
	 */
	public function save(Request $request)
	{
        $input = $request->except(['_token', 'q', 'id', 'password', 'password2', 'role']);
        $id = $request->get('id');
        $role = $request->get('role');

        $password = $request->get('password');
        $password2 = $request->get('password2');

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
        }

        if (!empty($id)) {
            $user = $this->user->find($id);
        } else {
            $user = $this->user;
        }

        $user->find($id);
        $user->fill($input);
        $user->save();

        // Attach Role
        if (!empty($role)) $user->roles()->sync([$role]);

        return redirect()->route('user-edit',['id' => $user->id])->with('success', trans('success.user', ['username' => $user->username]));
	}

	/**
	 * Role.
	 *
	 * @return Array
	 */
	private function roles()
	{
        $array = [];

        $roles = $this->role->all();
        if (!empty($roles)) {
            foreach ($roles as $r) {
                $array[$r->id] = $r->role;
            }
        }

        return $array;
	}

}
