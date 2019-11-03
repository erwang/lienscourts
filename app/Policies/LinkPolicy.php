<?php

namespace App\Policies;

use App\Link;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any links.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function view(User $user, Link $link)
    {
        return $user->id==$link->user_id;
    }

    /**
     * Determine whether the user can create links.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function update(User $user, Link $link)
    {
        return $user->id==$link->user_id;
    }

    /**
     * Determine whether the user can delete the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function delete(User $user, Link $link)
    {
        return $user->id==$link->user_id;
    }

    /**
     * Determine whether the user can restore the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function restore(User $user, Link $link)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function forceDelete(User $user, Link $link)
    {
        //
    }
}
