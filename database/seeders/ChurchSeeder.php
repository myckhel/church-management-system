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
      $membersCount = 30;
      Church::factory()
      ->has(
        Church::factory()->count(17)->hasMembers($membersCount)
      )->hasMembers($membersCount)
      ->hasServices(6)
      ->hasGivings(16)
      ->hasGroups(7)
      ->count(3)->create();
    }
}
