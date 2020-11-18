<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SmsMethod;
use App\Models\SmsClient;
use Faker\Factory as Faker;

class SmsMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $c = SmsClient::inRandomOrder()->limit(300)->pluck('id');
      SmsMethod::factory()->count(
        max($faker->numberBetween(
          200, $c->count()
        ), $c->count())
      )
      ->state(['sms_client_id'=> fn () => $faker->randomElement($c)])
      ->create();
    }
}
