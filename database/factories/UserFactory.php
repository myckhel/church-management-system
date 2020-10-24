<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $geo = Country::select(['id', 'phonecode'])->whereHas('state')
        ->with(['state' => fn ($q) => $q->inRandomOrder()])->inRandomOrder()->first();

        return [
            'email'             => $this->faker->unique()->safeEmail,
            'title'             => $this->faker->randomElement(['Mr', 'Mrs', 'Miss','Dr (Mrs)', 'Dr', 'Prof', 'Chief', 'Chief (Mrs)', 'Engr', 'Surveyor', 'HRH','Elder']),
            'firstname'         => $this->faker->firstName,
            'lastname'          => $this->faker->lastName,
            'sex'               => $this->faker->randomElement(['male', 'female']),
            'dob'               => $this->faker->dateTimeBetween(Carbon::now()->subtract('90 years'), Carbon::now()->subtract('3 years')),
            'phone_code'        => $geo->phonecode,
            'phone'             => $this->faker->randomNumber(8),
            'marital_status'    => $this->faker->randomElement(['married', 'single', 'divorced']),
            'occupation'        => $this->faker->jobTitle,
            'country_id'        => $geo->id,
            'state_id'          => $geo->state->id,
            'address'           => $this->faker->address,
            'email_verified_at' => now(),
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
