<?php

use Faker\Generator as Faker;

$factory->define(App\Seat::class, function (Faker $faker) {
    return [
        'rowCount' => $faker->numberBetween(5, 26),
        'columnCount' => $faker->numberBetween(5, 20),
    ];
});

//factory not in use