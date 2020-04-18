<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AuthorBook;
use Faker\Generator as Faker;

$factory->define(AuthorBook::class, function (Faker $faker) {
    return [
        'author_id' => factory(\App\Author::class)->create(),
        'book_id' => factory(\App\Book::class)->create()
    ];
});
