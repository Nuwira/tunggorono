<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Permission;

class PermissionTableSeeder extends Seeder {

    public function run()
    {
        Permission::truncate();

        Permission::create([
            'id' => 1,
            'name' => 'login-web',
            'display' => 'Login to Web',
            'description' => 'Allow user to log in via web.',
            'is_default' => 1,
            'is_readonly' => 1,
        ]);

        Permission::create([
            'id' => 2,
            'name' => 'login-api',
            'display' => 'Login via API',
            'description' => 'Allow user to log in via API.',
            'is_default' => 0,
            'is_readonly' => 1,
        ]);
    }

}