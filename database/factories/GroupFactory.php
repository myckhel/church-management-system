<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name'  => $this->faker->name.' Group',
        ];
    }

    public function configure(){
      return $this->afterCreating(function (Group $group) {
        GroupMember::factory()->count(3)->create([
          'group_id' => $group->id,
        ]);
      });
    }
}
