<?php

use Faker\Generator as Faker;

$factory->define(App\Seat::class, function (Faker $faker) {
    return [
        'priceCategory' => $faker->randomDigitNotNull,
        'description' => $faker->text,

    ];
});

//factory not in use
