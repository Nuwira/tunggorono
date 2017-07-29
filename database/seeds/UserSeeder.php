<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        User::create([
            'name' => 'Tunggorono',
            'email' => 'tunggorono@nuwira.co.id',
            'password' => bcrypt(app()->environment('production') ? str_random() : 'tunggorono'),
            'role_id' => 1,
        ]);
    }
}
