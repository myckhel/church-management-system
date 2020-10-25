<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\GroupMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GroupMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'member_id'  => Member::inRandomOrder()->first()->id,
        ];
    }
}
