<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SmsClient;
use App\Models\Church;
use Faker\Factory as Faker;

class SmsClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $cid = Church::inRandomOrder()->limit(300)->pluck('id');
      SmsClient::factory()->count($faker->numberBetween(50, 300))
      ->state(['church_id'=> fn () => $faker->randomElement($cid)])
      ->hasMethods($faker->numberBetween(3, 10))
      ->create();
    }
}
