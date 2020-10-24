<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Church;

class ChurchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $membersCount = 1;
      Church::factory()
      ->has(
        Church::factory()->hasMembers($membersCount)
      )->hasMembers($membersCount)
      ->hasServices(1)
      ->hasGivings(3)
      ->count(1)->create();
    }
}
