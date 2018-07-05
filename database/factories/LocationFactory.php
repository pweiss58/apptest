<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'plz' => $faker->postcode,
        'city' => $faker->city,
        'address' => $faker->address,
        'hallenName' => $faker->word."-Halle",
        'anfahrtsLink' => $faker->url,
        'departmentCount' => $faker->numberBetween(1, 6),
    ];
});