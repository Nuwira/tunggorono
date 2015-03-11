<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Role;

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->truncate();

        Role::create([
            'id' => 1,
            'role' => 'Superuser',
        ]);
    }

}