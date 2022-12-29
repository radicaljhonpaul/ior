<?php

namespace App\Http\Controllers;

use App\Traits\GatesTrait;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\PermissionUser;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsController extends Controller
{
    use GatesTrait;

    public function fetchRolesExceptCurrent(Request $request) {
        $PermissionsBasedOnUser = $this->getRolesExceptCurrentRole(Auth::user()->id);
        return $PermissionsBasedOnUser;
    }
}
