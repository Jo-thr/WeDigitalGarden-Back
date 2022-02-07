<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FrameworkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any frameworks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view frameworks');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view frameworks');
    }

    /**
     * Determine whether the user can create frameworks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create frameworks');
    }

    /**
     * Determine whether the user can update the frameworks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('update frameworks');
    }

    /**
     * Determine whether the user can delete the frameworks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete frameworks');
    }
}
