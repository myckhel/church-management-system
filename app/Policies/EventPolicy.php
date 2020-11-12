<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
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
     * @param  \App\Models\Event  $event
     * @return mixed
     */
    public function view($user, Event $event)
    {
      return $user->church_id == $event->getChurchId()
        || $user->church->church_id == $event->getChurchId();
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
     * @param  \App\Models\Event  $event
     * @return mixed
     */
    public function update($user, Event $event)
    {
      return $user->church_id == $event->getChurchId();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return mixed
     */
    public function delete($user, Event $event)
    {
      return $user->church_id == $event->getChurchId();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return mixed
     */
    public function restore(User $user, Event $event)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return mixed
     */
    public function forceDelete(User $user, Event $event)
    {
        //
    }
}
