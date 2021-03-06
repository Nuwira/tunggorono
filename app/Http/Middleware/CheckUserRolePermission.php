<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CheckUserRolePermission
{
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = $this->auth->user();
		$route = $request->route();

		if ($user && $route) {
            $actions = $route->getAction();

            if (array_key_exists('permissions', $actions)) {
                $permissions = $actions['permissions'];

                if (is_string($permissions)) {
                    $permissions = explode(',', $permissions);
                }

                foreach ($permissions as $permission) {
                    if (!$user->can($permission)) {
                        return redirect('dashboard')->withError(trans('errors.403'));
                    }
                }
            }
        }

		return $next($request);
	}

}
