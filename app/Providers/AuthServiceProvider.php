<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Permission;
use App\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        try {
            // roles ...
            $roles = Role::all();
            foreach ($roles as $role) {
                Gate::define($role->name, function($user) use ($role) {
                    return $user->hasRole($role->name);
                });
            }

            // permissions ...
            $permissions = Permission::all();
            foreach ($permissions as $permission) {
                Gate::define($permission->name, function($user) use ($permission) {
                    return $user->hasPermission($permission->name);
                });
            }


        } catch (\Exception $e) {
            return $e;
        }
    }
}
