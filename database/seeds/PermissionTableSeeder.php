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
            'display' => 'Login to Web',
            'description' => 'Allow user to log in via web.',
            'is_default' => 1,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'login-api',
            'display' => 'Login via API',
            'description' => 'Allow user to log in via API.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'edit-profile-web',
            'display' => 'Edit Profile via web',
            'description' => 'Allow user to edit profile via web.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'edit-profile-api',
            'display' => 'Edit Profile via API',
            'description' => 'Allow user to edit profile via API.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'system-info',
            'display' => 'View System Information',
            'description' => 'View system information.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'users-list',
            'display' => 'List Users',
            'description' => 'List users.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'user-add',
            'display' => 'Add User',
            'description' => 'Add user.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'user-edit',
            'display' => 'Edit User',
            'description' => 'Edit user.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'user-info',
            'display' => 'View User Info',
            'description' => 'View user information.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'roles-list',
            'display' => 'List Roles',
            'description' => 'List roles.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'role-add',
            'display' => 'Add Role',
            'description' => 'Add role.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'role-edit',
            'display' => 'Edit Role',
            'description' => 'Edit role.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'role-info',
            'display' => 'View Role Info',
            'description' => 'View role information.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permissions-list',
            'display' => 'List Permissions',
            'description' => 'List permissions.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permission-add',
            'display' => 'Add Permission',
            'description' => 'Add permission.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permission-edit',
            'display' => 'Edit Permission',
            'description' => 'Edit permission.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'name' => 'permission-info',
            'display' => 'View Permission Info',
            'description' => 'View permission information.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);
    }

}