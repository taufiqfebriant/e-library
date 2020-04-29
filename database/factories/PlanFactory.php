<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'name' => "Paket {$faker->word}",
        'description' => $faker->text,
        'price' => $faker->randomNumber,
        'months' => $faker->randomDigit
    ];
});
