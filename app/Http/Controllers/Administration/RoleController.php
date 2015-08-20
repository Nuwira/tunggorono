<?php namespace App\Http\Controllers\Administration;

use App\Http\Controllers\AuthenticatedController;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

use Date;
use Format;
use Auth;
use App\Http\Requests\SaveroleValidationRequest;
use App\Http\Requests\SaveProfileValidationRequest;

class RoleController extends AuthenticatedController
{
	/**
	 * Create a new controller instance.
	 *
	 * @param Illuminate\Auth\Guard $auth
	 * @param App\Models\User $user
	 * @param App\Models\Role $role
	 * @param App\Models\Permission $permission
	 * @param Illuminate\Http\Request $request
	 * @return void
	 */
	public function __construct(
	    Guard $auth, User $user, 
	    Role $role, 
	    Permission $permission, 
	    Request $request
    ) {
		parent::__construct($auth);
		
		$this->user = $user;
		$this->role = $role;
		$this->permission = $permission;
		$this->request = $request;
	}

	/**
	 * role management.
	 *
	 * @return Response
	 */
	public function index()
	{
		$search = $this->data['search'] = trim($this->request->get('search'));

		$this->data['roles'] = $this->role->where('id','>=',$this->auth->user()->roles[0]->id);
		if (!empty($search)) {
    		$this->data['roles'] = $this->data['roles']->where(function($query) use ($search) {
                $search = '%'.str_slug($search,'%').'%';
                $query->where('role', 'like', $search);
                $query->orWhere('name', 'like', $search);
    		});
    	}
    	$this->data['roles'] = $this->data['roles']->get();

		$this->data['sitetitle'] = trans('roles.titles.management');

		return view('roles.index')->with($this->data);
	}

	/**
	 * Add role.
	 *
	 * @return Response
	 */
	public function add()
	{
		$this->data['roles'] = $this->roles();

		$this->data['sitetitle'] = trans('roles.titles.add');

		$this->data['permissions'] = $this->permission->all();

		return view('roles.form')->with($this->data);
	}

	/**
	 * Info role.
	 *
	 * @param $id
	 * @return Response
	 */
	public function info($id)
	{
		$this->data['role'] = $this->role->find($id);

		$this->data['sitetitle'] = trans('roles.titles.info', ['role' => $this->data['role']->role]);

		return view('roles.info')->with($this->data);
	}

	/**
	 * Edit role.
	 *
	 * @param $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['role'] = $this->role->find($id);

		$this->data['permissions'] = $this->permission->all();
		$this->data['inroles'] = [];

		foreach ($this->data['role']->perms()->get() as $perm) {
    		array_push($this->data['inroles'], $perm->id);
		}

		$this->data['sitetitle'] = trans('roles.titles.edit', ['role' => $this->data['role']->role]);

		return view('roles.form')->with($this->data);
	}

    /**
	 * Save role.
	 *
	 * @param App\Http\Requests\SaveroleValidationRequest
	 * @return Response
	 */
	public function save(Request $request)
	{
        $input = $request->except(['_token', 'q', 'id', 'permissions']);
        $id = $request->get('id');
        $permissions = $request->get('permissions');

        $input['name'] = str_slug($input['role']);

        if (!empty($id)) {
            $role = $this->role->find($id);
        } else {
            $role = $this->role;
        }

        $role->fill($input);
        $role->save();
        $role->perms()->sync($permissions);

        return redirect()
            ->route('role-edit',['id' => $role->id])
            ->with('success', trans('success.role', ['rolename' => $role->name]));
	}

	/**
	 * Role.
	 *
	 * @return Array
	 */
	private function roles()
	{
        $array = [];

        $roles = $this->role->where('id','>',Auth::user()->roles()->get()[0]->id)->get();
        if (!empty($roles)) {
            foreach ($roles as $r) {
                $array[$r->id] = $r->role;
            }
        }

        return $array;
	}

}
