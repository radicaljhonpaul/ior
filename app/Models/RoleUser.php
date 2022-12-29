<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    
    protected $fillable = [
        'role_id',
        'user_id',
    ];

    public function rolesUserToUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function rolesUserToRole(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function roleUserToPermissionRole(){
        return $this->hasMany(PermissionRole::class, 'role_id', 'role_id');
    }
}
