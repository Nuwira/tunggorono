<?php namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    /**
	 * The attributes that are guarded.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'is_readonly'];

	public function scopeOfLevel($query, $id)
    {
        return $query->where('id','=',$id);
    }

    public function scopeMinLevel($query, $id)
    {
        return $query->where('id','>=',$id);
    }

    /**
     * Many-to-Many relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(config('auth.model'), config('entrust.role_user_table'), 'user_id', 'role_id');
    }

}