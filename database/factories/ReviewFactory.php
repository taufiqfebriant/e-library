<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Review;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'book_id' => 1,
        'user_id' => factory(\App\User::class)->create(),
        'rating'  => $faker->randomDigit,
        'comment' => $faker->text,
    ];
});
