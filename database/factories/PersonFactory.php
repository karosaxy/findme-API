<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'city' => $faker->city,

    ];
});
