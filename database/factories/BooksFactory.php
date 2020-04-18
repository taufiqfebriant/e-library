<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;


$factory->define(App\Book::class, function (Faker $faker) {
    return;
    // return [
    //     'title'         => $faker->name,
    //     'synopsis'      => $faker->text,
    //     'cover'         => '',
    //     'pages'         => $faker->randomDigit,
    //     'preview'       => '',
    //     'category_id'   => '',
    //     'publisher_id'  => '',
    // ];
});
