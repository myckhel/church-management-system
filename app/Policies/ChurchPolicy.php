<?php

namespace App\Policies;

use App\Models\Church;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChurchPolicy
{
    use HandlesAuthorization;

    function member(User $user, Church $church) {
      return !!$church->hasMember($user)->first();
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Church  $church
     * @return mixed
     */
    public function view(User $user, Church $church)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Church  $church
     * @return mixed
     */
    public function update(User $user, Church $church)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Church  $church
     * @return mixed
     */
    public function delete(User $user, Church $church)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Church  $church
     * @return mixed
     */
    public function restore(User $user, Church $church)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Church  $church
     * @return mixed
     */
    public function forceDelete(User $user, Church $church)
    {
        //
    }
}
