<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Nuwira\Bandrek\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role_id', 'birthdate', 'gender'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates = [
        'birthdate'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
    
    public function setGenderAttribute($value)
    {
        $value = strtoupper($value);
        
        if (! in_array($value, ['M', 'F'])) {
            $value = null;
        }
        
        $this->attributes['gender'] = $value;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
