<?php

use Faker\Generator as Faker;

function fakerDate (Faker $faker, $id){
  // check unique date
  $date = $faker->dateTimeBetween('2015-01-01', '2019-05-27')->format('Y-m-d h:i:s');
  $unique = App\Collection::where('branch_id', $id)->where('date', $date)->first();
  if ($unique) {
    $date = fakerDate($faker);
  }
  return $date;
}

$factory->define(App\Collection::class, function (Faker $faker) {
  $id = null;
    return [
        'branch_id' => (function($faker, $id){
          $id = $faker->randomElement(App\User::pluck('id')->toArray());
          return $id;
        })($faker, $id),
        'amount' => $faker->numberBetween(2000, 9000),
        'service_types_id' => $faker->randomElement((function(){
          return App\ServiceType::pluck('id')->toArray();
        })()),
        'collections_types_id' => $faker->randomElement((function(){
          return App\CollectionsType::pluck('id')->toArray();
        })()),
        'date' => fakerDate ($faker, $id),
    ];
});
