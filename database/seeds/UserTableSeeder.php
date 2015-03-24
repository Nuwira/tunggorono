<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::truncate();

        // Random Password
        //$password = str_random(8);
        $password = 'nuwira';

        User::create([
            'username' => 'nuwira',
            'name' => 'Nuwira',
            'email' => 'hi@nuwira.com',
            'password' => Hash::make($password),
            'is_active' => 1,
        ]);

        $this->command->info('');
        $this->command->comment(' Username : nuwira');
        $this->command->comment(' Password : '.$password);
        $this->command->info('');
    }

}