<?php namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    /**
	 * The attributes that are guarded.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'is_readonly'];
}