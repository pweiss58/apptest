<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
        'rowCount' => $faker->numberBetween(5, 20),
        'columnCount' => $faker->numberBetween(5, 20),
    ];
});
