<?php namespace App\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Models\User;

use Date;
use Format;

use Illuminate\Support\Facades\DB;

class SystemController extends Controller
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

		$this->data['sitetitle'] = trans('system.title');
	}

	/**
	 * View system info.
	 *
	 * @return Response
	 */
	public function index()
	{
		$laravel = app();
		$request = new Request;
		//dd($request->server());

		$this->data['infos'] = [
            'laravel' => $laravel::VERSION,
		    'environment' => getenv('APP_ENV'),
		    'ipserver' => (!empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : ''),
		    'url' => config('app.url'),
		    'hostname' => gethostname(),
		    'os' => PHP_OS . ' '.php_uname('r').' '.php_uname('m'),
		    'webserver' => (!empty($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : ''),
		    'php' => phpversion(),
		    'db' => $this->dbversion(),
        ];
		return view('system.info')->with($this->data);
	}

	private function dbversion()
	{
		$version = $software = '';
		$driver = config('database.default');
		switch ($driver) {
			case 'mysql':
				$result = DB::select( DB::raw("SELECT VERSION() AS `version`") );
				$software = "MySQL";
				$version = (!empty($result[0]->version) ? $result[0]->version : '');
                break;
			case 'sqlite':
				$result = DB::select( DB::raw("SELECT sqlite_version() AS `version`") );
				$software = "SQL Lite";
				$version = (!empty($result[0]->version) ? $result[0]->version : '');
                break;
			case 'pgsql':
				$result = DB::select( DB::raw("SELECT version() AS `version`") );
				$software = "PostgreSQL";
				$version = (!empty($result[0]->version) ? $result[0]->version : '');
                break;
			case 'sqlsrv':
				$result = DB::select( DB::raw("SELECT @@VERSION AS `version`") );
				$software = "SQL Server";
				$version = (!empty($result[0]->version) ? $result[0]->version : '');
                break;
            default:
				$version = '';
		}

		return $software.' '.$version;
	}

}