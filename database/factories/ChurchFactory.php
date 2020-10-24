<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Country;
use App\Models\Church;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChurchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Church::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $geo = Country::select(['id'])->whereHas('state')
      ->with(['state' => fn ($q) => $q->inRandomOrder()])->inRandomOrder()->first();

      return [
        'user_id'           => User::inRandomOrder()->first()->id,
        'email'             => $this->faker->unique()->safeEmail,
        'name'              => $this->faker->name.' Church',
        'country_id'        => $geo->id,
        'state_id'          => $geo->state->id,
        'address'           => $this->faker->address,
      ];
    }
}
