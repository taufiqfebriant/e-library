<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'synopsis' => $faker->text,
        'cover' => 'uploads/book/covers/cover.jpg',
        'file' => 'uploads/book/files/pdfs/file.pdf',
        'preview' => 'uploads/book/previews/pdfs/cuplikan.pdf',
        'category_id' => factory(\App\Category::class)->create(),
        'publisher_id' => factory(\App\Publisher::class)->create()
    ];
});
