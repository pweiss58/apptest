<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'startDate' => $faker->dateTime,
        'endDate' => $faker ->dateTime,
        'countAvailable' => $faker ->randomDigitNotNull,
        'countReserved' => $faker ->randomDigitNotNull,
    ];
});

//factory not in use
