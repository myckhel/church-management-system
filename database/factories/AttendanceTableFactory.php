<?php

use Faker\Generator as Faker;

function fakeDate (Faker $faker, $id){
  // check unique date
  $date = $faker->dateTimeBetween('2015-01-01', '2019-05-27')->format('Y-m-d h:i:s');
  $unique = App\Attendance::where('branch_id', $id)->where('attendance_date', $date)->first();
  if ($unique) {
    $date = fakeDate($faker);
  }
  return $date;
}

$factory->define(App\Attendance::class, function (Faker $faker) {
    $id = null;
    return [
      'branch_id' => (function($faker, $id){
        $id = $faker->randomElement(App\User::pluck('id')->toArray());
        return $id;
      })($faker, $id),
      'male' => $faker->numberBetween(50,150),
      'female' => $faker->numberBetween(50,150),
      'children' => $faker->numberBetween(20,100),
      'service_types_id' => $faker->randomElement((function(){
        return App\ServiceType::pluck('id')->toArray();
      })()),
      'attendance_date' => fakeDate ($faker, $id),
    ];
});
