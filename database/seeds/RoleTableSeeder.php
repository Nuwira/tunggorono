<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Role;

class RoleTableSeeder extends Seeder {

    public function run()
    {
        Role::truncate();

        $role = Role::create([
            'id' => 1,
            'name' => 'superuser',
            'role' => 'Superuser',
            'description' => 'With great power comes great responsibility',
            'is_readonly' => 1,
        ]);

        $role = Role::create([
            'id' => 2,
            'name' => 'administrator',
            'role' => 'Administrator',
            'description' => 'All administration will be done using this account',
            'is_readonly' => 1,
        ]);
    }

}