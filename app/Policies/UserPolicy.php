<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('view users') || $user->is_admin || env('FORCE_ADMIN')) {
            return true;
        }

        return false;
    }

    public function view(User $user)
    {
        if ($user->hasPermissionTo('view users') || $user->is_admin || env('FORCE_ADMIN')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('create users') || $user->is_admin || env('FORCE_ADMIN')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('update users');
    }

    /**
     * Determine whether the user can delete the users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete users');
    }
}
