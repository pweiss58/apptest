<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'ort' => $faker->city,
        'halle' => $faker->word,
        'address' => $faker->address,
        'plz' => $faker->postcode,
        'anfahrtsLink' => $faker->url,

    ];
});