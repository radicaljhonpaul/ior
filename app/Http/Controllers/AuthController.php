<?php

namespace App\Http\Controllers;

use App\Traits\GatesTrait;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\PermissionUser;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\Password as RulesPassword;

class AuthController extends Controller
{
    use GatesTrait;

    public function register(Request $request) {

        ob_start('ob_gzhandler');
        DB::beginTransaction();
            try {
                // $this->authorize('users-create');
                
                $fields = $request->validate([
                    'fname' => 'required|string',
                    'lname' => 'required|string',
                    'contact_number' => 'required|string',
                    'company_id' => 'required|integer',
                    'email' => 'required|string|unique:users,email',
                    'contact_number' => 'required|string',
                    'password' => 'required|string|confirmed'
                ]);
                
                $user = User::create([
                    'fname' => $fields['fname'],
                    'lname' => $fields['lname'],
                    'email' => $fields['email'],
                    'contact_number' => $fields['contact_number'],
                    // 'is_primary_contact' => $fields['is_primary_contact'],
                    // 'user_role_id' => $fields['user_role_id'],
                    'company_id' => $fields['company_id'],
                    'password' => bcrypt($fields['password'])
                ]);
        
                $role = '';
                if($request->has('role') && $request->role == 'primay_client'){
                    $role = 4;
                }else if($request->has('role') && $request->role == 'secondary_client'){
                    $role = 5;
                }else if($request->has('role') && $request->role == 'administrator'){
                    $role = 2;
                }else if($request->has('role') && $request->role == 'employee'){
                    $role = 3;
                }else;

                // Check if saving for a primary contact
                # Insert to role_user
                $role_user = new RoleUser();
                $role_user->role_id = $role;
                $role_user->user_id = $user->id;
                $role_user->user_type = 'App\Models\User';
                $role_user->save();

                // PermissionsBasedOnRole
                $PermissionsBasedOnRole = $this->getPermissionsRole($role_user->role_id);
                foreach ($PermissionsBasedOnRole as $key) {
                    // Insert to permission_user
                    $permission_user = new PermissionUser();
                    $permission_user->permission_id = $key;
                    $permission_user->user_id = $user->id;
                    $permission_user->user_type = 'App\Models\User';
                    $permission_user->save();
                }

                $token = $user->createToken('myapptoken')->plainTextToken;
        
                $response = [
                    'user' => $user,
                    'token' => $token
                ];

            DB::commit();
            // If all is good
            return response($response, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['message' => $e->getMessage()], 401);
        }
        ob_end_flush();
        
    }

    public function registerPrimaryUsers(Request $request) {

        ob_start('ob_gzhandler');
        DB::beginTransaction();
            try {
                $fields = $request->validate([
                    'fname' => 'required|string',
                    'lname' => 'required|string',
                    'contact_number' => 'required|string',
                    'company_id' => 'required|integer',
                    'email' => 'required|string|unique:users,email',
                    'contact_number' => 'required|string',
                    'password' => 'required|string|confirmed'
                ]);

                $user = User::create([
                    'fname' => $fields['fname'],
                    'lname' => $fields['lname'],
                    'email' => $fields['email'],
                    'contact_number' => $fields['contact_number'],
                    'company_id' => $fields['company_id'],
                    'password' => bcrypt($fields['password'])
                ]);
        
                $role = '';
                if($request->has('role') && $request->role == 'primay_client'){
                    $role = 4;
                }else if($request->has('role') && $request->role == 'secondary_client'){
                    $role = 5;
                }else if($request->has('role') && $request->role == 'administrator'){
                    $role = 2;
                }else if($request->has('role') && $request->role == 'employee'){
                    $role = 3;
                }else;

                // Check if saving for a primary contact
                # Insert to role_user
                $role_user = new RoleUser();
                $role_user->role_id = $role;
                $role_user->user_id = $user->id;
                $role_user->user_type = 'App\Models\User';
                $role_user->save();

                // PermissionsBasedOnRole
                $PermissionsBasedOnRole = $this->getPermissionsRole($role_user->role_id);
                
                foreach ($PermissionsBasedOnRole as $key) {
                    // Insert to permission_user
                    $permission_user = new PermissionUser();
                    $permission_user->permission_id = $key;
                    $permission_user->user_id = $user->id;
                    $permission_user->user_type = 'App\Models\User';
                    $permission_user->save();
                }

            DB::commit();
            // If all is good
            return 1;
        } catch (\Exception $e) {
            DB::rollback();

            if($e->getMessage() == 'The email has already been taken.'){
                return response(['message' => $e->getMessage()], 400);
            }else{
                return response(['message' => $e->getMessage()], 401);
            }
        }
        ob_end_flush();
        
    }

    public function updatePrimaryUsers(Request $request) {

        ob_start('ob_gzhandler');
        DB::beginTransaction();
            try {

                $fields = $request->validate([
                    'fname' => 'required|string',
                    'lname' => 'required|string',
                    'contact_number' => 'required|string',
                    'company_id' => 'required|integer',
                    'email' => 'required|string',
                    'contact_number' => 'required|string',
                    'password' => 'required|string|confirmed'
                ]);

                $user = User::upsert(
                    [
                        'id' => $request->id,
                        'fname' => $fields['fname'],
                        'lname' => $fields['lname'],
                        'email' => $fields['email'],
                        'contact_number' => $fields['contact_number'],
                        'company_id' => $fields['company_id'],
                        'password' => bcrypt($fields['password'])
                    ],
                    ['id'],
                    ['fname','lname','email','contact_number','company_id','password']
                );
        
            DB::commit();
            // If all is good
            return 1;
        } catch (\Exception $e) {
            DB::rollback();

            if($e->getMessage() == 'The email has already been taken.'){
                return response(['message' => $e->getMessage()], 400);
            }else{
                return response(['message' => $e->getMessage()], 401);
            }
        }
        ob_end_flush();
        
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email // Returned with Roles and Permissions
        $user = User::with('roles')->with('permissions')->where('email', $fields['email'])->first();
        
        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong Credentials, Please check your email and password.'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    public function forgotPassword(Request $request) {

        $request->validate([
            'email' => 'required|string',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status == Password::RESET_LINK_SENT){
            return [
                'status' => __($status)
            ];
        }

        throw ValidationException::withMessages([
                'email' => [trans($status)],
        ]);
    }

    public function resetThePassword(Request $request) {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request){
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response([
                'message'=> 'Password reset successfully'
            ]);
        }

        return response([
            'message'=> __($status)
        ], 500);
    }
    
}