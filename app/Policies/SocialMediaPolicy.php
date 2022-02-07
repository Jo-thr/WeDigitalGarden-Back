<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialMediaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any social media.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view social media');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view social media');
    }

    /**
     * Determine whether the user can create social media.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create social media');
    }

    /**
     * Determine whether the user can update the social media.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('update social media');
    }

    /**
     * Determine whether the user can delete the social media.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete social media');
    }
}
