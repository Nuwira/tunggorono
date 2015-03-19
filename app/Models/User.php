<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	use EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'name', 'email', 'password' ,'sex', 'phone', 'birthdate', 'is_active'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('entrust.role'), config('entrust.role_user_table'), 'user_id', 'role_id');
    }

    /**
     * Return table name.
     *
     * @return $table
     */
    public function table()
    {
        return $this->table;
    }

    public function listMinRole($role_id)
    {
        return $this->join(config('entrust.role_user_table'), config('entrust.role_user_table').'.user_id', '=', $this->table.'.id')
            ->join(config('entrust.roles_table'), config('entrust.roles_table').'.id',' =', config('entrust.role_user_table').'.role_id')
            ->where(config('entrust.roles_table').'.id', '>=', $role_id)
            ->select([
                $this->table.'.*',
                config('entrust.roles_table').'.role',
            ]);
    }




}
