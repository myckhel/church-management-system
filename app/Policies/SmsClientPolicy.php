<?php

namespace App\Policies;

use App\Models\SmsClient;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SmsClientPolicy
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
     * @param  \App\Models\SmsClient  $smsClient
     * @return mixed
     */
    public function view($user, SmsClient $smsClient)
    {
      return $user->church_id == $smsClient->church_id || $user->church->church_id == $smsClient->church_id;
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
     * @param  \App\Models\SmsClient  $smsClient
     * @return mixed
     */
    public function update($user, SmsClient $smsClient)
    {
      return $user->church_id == $smsClient->church_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SmsClient  $smsClient
     * @return mixed
     */
    public function delete($user, SmsClient $smsClient)
    {
      return $user->church_id == $smsClient->church_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SmsClient  $smsClient
     * @return mixed
     */
    public function restore(User $user, SmsClient $smsClient)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SmsClient  $smsClient
     * @return mixed
     */
    public function forceDelete(User $user, SmsClient $smsClient)
    {
        //
    }
}
