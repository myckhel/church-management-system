<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Giving;
use App\Models\EventGiving;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventGivingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventGiving::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'event_id'  => Event::inRandomOrder()->first()->id,
          'giving_id' => Giving::inRandomOrder()->first()->id,
          'amount'    => $this->faker->numberBetween(1000, 50000),
        ];
    }
}
