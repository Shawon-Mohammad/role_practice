<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = User::with('roles')->first();
        // Auth::login($user);
        if ($user) {
            // $role = Role::with('permissions')->first();
            // if ($user->roles->isEmpty()) {
            //     $user->roles()->sync([$user->id]);
            // }
            // if ($role->permissions->isEmpty()) {
            //     $role->permissions()->sync([$role->id]);
            // }
            // dump(['role->permissions' => $role->permissions]);
            $roles = Role::with('permissions')->get();
            $permissionsArray = [];
            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }

            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function ($user) use ($roles) {
                    return array_intersect($user->roles->pluck('id')->toArray(), $roles) !== [];
                });
            }
        }

        return $next($request);
    }
}
