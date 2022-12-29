<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\PermissionUser;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;

trait GatesTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */

    public function getPermissionsRoleObj($role_id) {
        return PermissionRole::where('role_id', $role_id)->get();
    }

    public function getPermissionsRole($role_id) {
        return PermissionRole::where('role_id', $role_id)->get()
        ->map(function($e){
            return $e->permission_id;
        });
    }

    public function getPermissionsUserObj($user_id) {
        return PermissionUser::where('user_id', $user_id)->get();
    }

    public function getPermissionsUser($user_id) {
        return PermissionUser::where('user_id', $user_id)->get()
        ->map(function($e){
            return $e->permission_id;
        });
    }

    public function getAllRoles() {
        return Role::get();
    }

    public function getRolesExceptCurrentRole($user_id) {
        return RoleUser::with('rolesUserToRole')->with(['roleUserToPermissionRole.permissionRoleToPermission'])
        // ->where('user_id', '!=', $user_id)
        // ->where('role_id', '!=', 1)
        ->get()
        ->unique('role_id');
    }

}