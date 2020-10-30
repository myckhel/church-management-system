<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\Church;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
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
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function view($user, Member $member, Church $church)
    {
      return !!$church->hasMember($member);
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
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function update($user, Member $member)
    {
      return !!$user->church->hasMember($member);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function delete($user, Member $member)
    {
      return !!$user->church->hasMember($member);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function restore(User $user, Member $member)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function forceDelete(User $user, Member $member)
    {
        //
    }
}
