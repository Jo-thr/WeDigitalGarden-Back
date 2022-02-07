<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpertisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any expertises.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view expertises');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view expertises');
    }

    /**
     * Determine whether the user can create expertises.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the expertises.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('update expertises');
    }

    /**
     * Determine whether the user can delete the expertises.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete expertises');
    }
}
