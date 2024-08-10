<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    factory(App\Branch::class, 40)->create()->each(function ($user) {
      $user->save();
    });
  }
}
