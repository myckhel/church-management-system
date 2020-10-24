<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'user_id'      => User::inRandomOrder()->first()->id,
          'member_since' => $this->faker->dateTimeBetween(Carbon::now()->subtract('20 years'), Carbon::now()),
        ];
    }
}
