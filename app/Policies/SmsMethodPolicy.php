<?php

namespace App\Policies;

use App\Models\SmsMethod;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SmsMethodPolicy
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
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return mixed
     */
    public function view($user, SmsMethod $smsMethod)
    {
      return !!$user->church->smsMethods()->find($smsMethod->id);
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
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return mixed
     */
    public function update(User $user, SmsMethod $smsMethod)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return mixed
     */
    public function delete($user, SmsMethod $smsMethod)
    {
      return !!$user->church->smsMethods()->find($smsMethod->id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return mixed
     */
    public function restore(User $user, SmsMethod $smsMethod)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return mixed
     */
    public function forceDelete(User $user, SmsMethod $smsMethod)
    {
        //
    }
}
