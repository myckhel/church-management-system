<?php

namespace App\Observers;

use App\Models\Church;

class ChurchObserver
{
    /**
     * Handle the church "created" event.
     *
     * @param  \App\Models\Church  $church
     * @return void
     */
    public function created(Church $church)
    {
      $user = $church->user;
      $member = $church->members()->create([
        'user_id' => $user->id,
      ]);
      $member->assignRole('super-admin');
    }

    /**
     * Handle the church "updated" event.
     *
     * @param  \App\Models\Church  $church
     * @return void
     */
    public function updated(Church $church)
    {
        //
    }

    /**
     * Handle the church "deleted" event.
     *
     * @param  \App\Models\Church  $church
     * @return void
     */
    public function deleted(Church $church)
    {
        //
    }

    /**
     * Handle the church "restored" event.
     *
     * @param  \App\Models\Church  $church
     * @return void
     */
    public function restored(Church $church)
    {
        //
    }

    /**
     * Handle the church "force deleted" event.
     *
     * @param  \App\Models\Church  $church
     * @return void
     */
    public function forceDeleted(Church $church)
    {
        //
    }
}
