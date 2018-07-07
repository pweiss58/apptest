<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text,
        'authorName' => $faker->userName,
        'authorEmail' => $faker->safeEmail,
    ];
});
