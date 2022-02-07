<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('view roles') || $user->is_admin || env('FORCE_ADMIN')) {
            return true;
        }

        return false;
    }

    public function view(User $user)
    {
        if ($user->hasPermissionTo('view roles') || $user->is_admin || env('FORCE_ADMIN')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('create roles') || $user->is_admin || env('FORCE_ADMIN')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('update roles');
    }

    /**
     * Determine whether the user can delete the roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete roles');
    }
}
