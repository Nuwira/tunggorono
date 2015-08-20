<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UserRolePermissionTableSeeder extends Seeder {

    public function run()
    {
        // Attach permission to role
        //DB::table(Config::get('entrust.permission_role_table'))->forceDelete();
        DB::table(Config::get('entrust.permission_role_table'))->truncate();
        $role = Role::find(1);
        $role->perms()->attach(Permission::lists('id')->all());
        $role = Role::find(2);
        $role->perms()->attach(Permission::lists('id')->all());

        // Attach role to user
        //DB::table(Config::get('entrust.role_user_table'))->forceDelete();
        DB::table(Config::get('entrust.role_user_table'))->truncate();
        $user = User::find(1);
        $user->roles()->attach(Role::find(1));
    }

}