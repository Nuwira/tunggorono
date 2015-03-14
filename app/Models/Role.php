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

}