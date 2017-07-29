<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * The role list
     * 
     * @var array
     * @access protected
     */
    protected $roles = [
        'Administrator',    
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        
        foreach ($this->roles as $role) {
            Role::create(compact('role'));
        }
    }
}
