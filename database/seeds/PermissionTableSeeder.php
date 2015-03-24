<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Permission;

class PermissionTableSeeder extends Seeder {

    public function run()
    {
        Permission::truncate();

        Permission::create([
            'name' => 'login-web',
            'permission' => 'Login to Web',
            'description' => 'Allow user to log in via web.',
            'is_default' => 1,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'login-api',
            'permission' => 'Login via API',
            'description' => 'Allow user to log in via API.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'edit-profile-web',
            'permission' => 'Edit Profile via web',
            'description' => 'Allow user to edit profile via web.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'edit-profile-api',
            'permission' => 'Edit Profile via API',
            'description' => 'Allow user to edit profile via API.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'system-info',
            'permission' => 'View System Information',
            'description' => 'View system information.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'user-list',
            'permission' => 'List Users',
            'description' => 'List users.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'user-info',
            'permission' => 'View User Info',
            'description' => 'View user information.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'user-add',
            'permission' => 'Add User',
            'description' => 'Add user.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'user-edit',
            'permission' => 'Edit User',
            'description' => 'Edit user.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'user-delete',
            'permission' => 'Delete User',
            'description' => 'Delete user.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'role-list',
            'permission' => 'List Roles',
            'description' => 'List roles.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'role-info',
            'permission' => 'View Role Info',
            'description' => 'View role information.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'role-add',
            'permission' => 'Add Role',
            'description' => 'Add role.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'role-edit',
            'permission' => 'Edit Role',
            'description' => 'Edit role.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'role-delete',
            'permission' => 'Delete Role',
            'description' => 'Delete role.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permission-list',
            'permission' => 'List Permissions',
            'description' => 'List permissions.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permission-info',
            'permission' => 'View Permission Info',
            'description' => 'View permission information.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permission-add',
            'permission' => 'Add Permission',
            'description' => 'Add permission.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permission-edit',
            'permission' => 'Edit Permission',
            'description' => 'Edit permission.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permission-delete',
            'permission' => 'Delete Permission',
            'description' => 'Delete permission.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);
    }

}