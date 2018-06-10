<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'category' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'countAvailable' => $faker->randomDigit,
        'countReserved' => $faker->randomDigit,
    ];
});
