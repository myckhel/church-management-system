<?php

use Faker\Generator as Faker;

$factory->define(App\CollectionsType::class, function (Faker $faker) {
  return [
    'branch_id' => $faker->randomElement((function(){
      return App\User::pluck('id')->toArray();
    })()),
    'name' => $faker->word . '_Collection',//
  ];
});
