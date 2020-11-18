<?php

namespace Database\Factories;

use App\Models\SmsClient;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmsClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmsClient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->word.' Sms',
          'endpoint' => $this->faker->url,
          'auth_type' => $this->faker->randomElement(['basic auth', 'api key', 'bearer token', 'oath 2.0']),
          'auth' => $this->faker->randomElement([
            ['username' => 'name', 'password' => 'password'],
            ['key' => 'key', 'value' => 'value', 'at' => $this->faker->randomElement(['header', 'query'])],
            ['token' => 'token'],
            ['token' => 'token', 'name' => 'name']
          ]),
          'is_global'         => $this->faker->randomElement([true, false]),
        ];
    }
}
