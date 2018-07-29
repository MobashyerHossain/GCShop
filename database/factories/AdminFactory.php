<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(App\Models\MultiAuth\Admin::class, function (Faker $faker) {
    return [
      'first_name' => $faker->firstname,
      'last_name' => $faker->lastname,
      'date_of_birth' => $faker->date,
      'email' => $faker->unique()->safeEmail,
      'password' => Hash::make('741852'),
      'verification_status' => true,
      'remember_token' => str_random(10),
    ];
});
