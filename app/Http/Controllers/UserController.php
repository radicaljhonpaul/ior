<?php

namespace App\Http\Controllers;

use App\Models\PermissionRole;
use App\Models\PermissionUser;
use App\Models\RoleUser;
use App\Models\User;
use App\Traits\GatesTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laratrust\Laratrust;

class UserController extends Controller
{
    use GatesTrait;

    public function index()
    {
        return User::all();
    }

    public function fetchAdminUsers()
    {

        // Authorized Roels and Permissions
        $this->authorize('users-create');

        return DB::table('role_user')
        ->select("*", DB::raw("CONCAT(users.fname,' ',users.lname) as full_name"))
        ->leftJoin('users', 'users.id', '=', 'role_user.user_id')
        ->whereIn('role_id', [2,3])
        ->get();

        // with(['rolesUserToUser' => function($query){
        //     return $query->select("*", DB::raw("CONCAT(users.fname,' ',users.lname) as full_name"))->get();
        // }])
        // ->whereIn('role_id', [2,3])
        // ->get();
        // return User::select("*", DB::raw("CONCAT(users.fname,' ',users.lname) as full_name"))
        //                 // ->where('user_role_id',2)
        //->get();

    }

    public function fetchAdminUser($id)
    {

        return User::with('roles')->with('permissions')->where('id',$id)->first();
    }

    public function update(Request $request){
        $user = User::find($request->id);

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

        if($user->roles[0]->name !=  $request->role){
            // If has changes in roles -> delete roles and permissions based on user_id
            // Update Role User
            $UpdatedRoleUser = RoleUser::where('user_id', $user->id)->update(['role_id' => $role]);

            // Delete PermissionUser
            $PermissionsBasedOnUserID = $this->getPermissionsUserObj($user->id);

            foreach ($PermissionsBasedOnUserID as $key) {
                PermissionUser::where('id',$key->id)->delete();
            }

            if($UpdatedRoleUser == 1){
                // PermissionsBasedOnRole

                $PermissionsBasedOnRole = $this->getPermissionsRole($role);
                foreach ($PermissionsBasedOnRole as $key) {
                    // Insert to permission_user
                    $permission_user = new PermissionUser();
                    $permission_user->permission_id = $key;
                    $permission_user->user_id = $user->id;
                    $permission_user->user_type = 'App\Models\User';
                    $permission_user->save();
                }
            }

        }

        $user->update($request->all());
        return $user;
    }

    public function delete($id){
        $user = User::find($id);

        $DeletedRoleUser = RoleUser::where('user_id', $user->id)->delete();

        if($DeletedRoleUser == 1){
            // Delete PermissionUser
            $PermissionsBasedOnUserID = $this->getPermissionsUserObj($user->id);
            foreach ($PermissionsBasedOnUserID as $key) {
                PermissionUser::where('id',$key->id)->delete();
            }
        }

        $user->delete();
        return response()->json("Record deleted!");
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'     => 'required',
            'password'     => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);


        $data = $request->all();

        $user = User::find($request->id);

        if(!\Hash::check($request->current_password, $user[0]->password)){

            return response()->json('You have entered wrong password');

        }else{

        // here you will write password update code
            if(\Hash::check($request->password, $user[0]->password)){

                return response()->json("You can't use your old password");

            }else{
                $user[0]->password = bcrypt($request->password);
                $user[0]->save();
                return response()->json('Success');
            }


        }
    }

    public function changeAvatar(Request $request)
    {

        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        /* Store $imageName name in DATABASE from HERE */
        $imageName = time().'.'.$request->file1->extension();
        $request->file1->move(storage_path('app/public/user_avatar/'.$request->id), $imageName);
        $user = User::find($request->id);


        $user->avatar = $imageName;

        $user->save();

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
