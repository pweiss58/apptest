<?php

use Faker\Generator as Faker;

$factory->define(App\Seat::class, function (Faker $faker) {
    return [
        'x' => $faker->numberBetween(1,30),
        'y' => $faker->numberBetween(1,30),
        'occupied' => $faker->boolean(10),
    ];

    //dieses Factory wird zurzeit nicht genutzt
});
