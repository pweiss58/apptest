<?php

use Faker\Generator as Faker;

$factory->define(App\Eventset::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' =>$faker->text,
        'eventCount' =>$faker->randomFloat(0, 1, 5),
    ];
});
