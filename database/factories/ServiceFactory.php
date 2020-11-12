<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'name'              => $this->faker->name.' Service',
        'start'             => now(),
        'duration'          => $this->faker->numberBetween(1, 20) * 30, // * 30 mins
        'recurrence'        => ['day' => $this->faker->numberBetween(1, 7), 'week' => 1],
        // {day, weekDay, week, monthWeek, month, yearMonth, year}
        'regular'           => $this->faker->randomElement([true, false]),
        'is_global'         => $this->faker->randomElement([true, false]),
      ];
    }

    public function configure(){
      return $this->afterCreating(function (Service $service) {
        $service->makeEvent();
      });
    }

    private function multipleOf($of = 1, $times = 10){
      for ($i=$of; $i < $times; $i += $times) {
        yield $i;
      }
    }
}
