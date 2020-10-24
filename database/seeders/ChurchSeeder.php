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
      Church::factory()
      ->has(
        Church::factory()->hasMembers(50)
      )->hasMembers(50)
      ->count(7)->create();
    }
}
