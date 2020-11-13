<?php

namespace App\Policies;

use App\Models\EventGiving;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventGivingPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Models\EventGiving  $eventGiving
     * @return mixed
     */
    public function view($user, EventGiving $eventGiving)
    {
      return $user->church_id == $eventGiving->getChurchId();
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
     * @param  \App\Models\EventGiving  $eventGiving
     * @return mixed
     */
    public function update($user, EventGiving $eventGiving)
    {
      return $user->church_id == $eventGiving->getChurchId();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EventGiving  $eventGiving
     * @return mixed
     */
    public function delete($user, EventGiving $eventGiving)
    {
      return $user->church_id == $eventGiving->getChurchId();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EventGiving  $eventGiving
     * @return mixed
     */
    public function restore(User $user, EventGiving $eventGiving)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EventGiving  $eventGiving
     * @return mixed
     */
    public function forceDelete(User $user, EventGiving $eventGiving)
    {
        //
    }
}
