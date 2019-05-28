<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'branchname' => $faker->name . ' Church',
        'branchcode' => $faker->randomNumber(6),
        'country' => $faker->country,
        'email' => $faker->unique()->safeEmail,
        'state' => $faker->state,
        'city' => $faker->city,
        'address' => $faker->address,
        'currency' => $faker->randomElement(['$', '₦']),
        'isadmin' => $faker->boolean,
        'password' => bcrypt('admin'),//'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

// $factory->define(App\Customer::class, function (Faker $faker) {
//     return [
//         'email' => $faker->unique()->safeEmail,
//         'gfx_id' => $faker->unique()->randomNumber(6),
//         'firstname' => $faker->firstname,
//         'lastname' => $faker->lastname,
//         'phone' => $faker->unique()->phoneNumber,
//     ];
// });
//
// $factory->define(App\Service::class, function (Faker $faker) {
//     return [
//         'name' => $faker->unique()->word,
//     ];
// });
