<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any formules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view formules');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view formules');
    }

    /**
     * Determine whether the user can create formules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create formules');
    }

    /**
     * Determine whether the user can update the formules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('update formules');
    }

    /**
     * Determine whether the user can delete the formules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete formules');
    }
}
