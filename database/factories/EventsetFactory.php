<?php

use Faker\Generator as Faker;

$factory->define(App\Eventset::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' =>$faker->text,
    ];
});
