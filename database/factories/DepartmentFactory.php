<?php

use Faker\Generator as Faker;

$factory->define(App\Seat::class, function (Faker $faker) {
    return [
        'rowCount' => $faker->numberBetween(6, 10),
        'columnCount' => $faker->numberBetween(7, 10),
    ];
});

//factory not in use