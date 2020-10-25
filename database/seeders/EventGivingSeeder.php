<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventGiving;

class EventGivingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      EventGiving::factory()->count(10)->create();
    }
}
