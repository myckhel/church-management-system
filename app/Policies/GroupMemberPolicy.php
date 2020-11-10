<?php

namespace App\Policies;

use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupMemberPolicy
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
     * @param  \App\Models\GroupMember  $groupMember
     * @return mixed
     */
    public function view($user, GroupMember $groupMember)
    {
      return $user->church->id == $groupMember->group->church->id;
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
     * @param  \App\Models\GroupMember  $groupMember
     * @return mixed
     */
    public function update(User $user, GroupMember $groupMember)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GroupMember  $groupMember
     * @return mixed
     */
    public function delete($user, GroupMember $groupMember)
    {
      return $user->church->id == $groupMember->group->church->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GroupMember  $groupMember
     * @return mixed
     */
    public function restore(User $user, GroupMember $groupMember)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GroupMember  $groupMember
     * @return mixed
     */
    public function forceDelete(User $user, GroupMember $groupMember)
    {
        //
    }
}
