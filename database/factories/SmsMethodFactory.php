<?php

namespace Database\Factories;

use App\Models\SmsMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmsMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmsMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name'   => ucwords($this->faker->word),
          'method' => $this->faker->randomElement(['post', 'get', 'put', 'patch', 'delete']),
          'params' => $this->generateKeyValue(
              $this->faker->numberBetween(2, 5)
            )
        ];
    }

    function generateKeyValue($count = 1) {
      $keys = [];
      for ($i=0; $i < $count; $i++) {
        $key = $this->faker->word;
        $value = $this->faker->word;
        $keys[$key] = $value;
      }
      return $keys;
    }
}
