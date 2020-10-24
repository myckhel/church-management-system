<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'event_id'      => Event::inRandomOrder()->first()->id,
          'male'          => $this->faker->numberBetween(100, 1000),
          'female'        => $this->faker->numberBetween(130, 1000),
          'children'      => $this->faker->numberBetween(50, 500),
        ];
    }
}
