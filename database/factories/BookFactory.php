<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'author_id' => 1,
        'total_copies' => 30,
        'available_copies' => 20
    ];
});
