<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;

    protected $table = 'permission_role';

    public function permissionRoleToPermission(){
        return $this->hasMany(Permission::class, 'id', 'permission_id');
    }
}
