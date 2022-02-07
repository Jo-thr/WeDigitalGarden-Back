<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UseCasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any use cases.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view use cases');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view use cases');
    }

    /**
     * Determine whether the user can create use cases.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create use cases');
    }

    /**
     * Determine whether the user can update the use cases.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('update use cases');
    }

    /**
     * Determine whether the user can delete the use cases.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete use cases');
    }
}
