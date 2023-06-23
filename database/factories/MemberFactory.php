<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->name,
        'phone' => '+5437540000',
        'borrowed_books_limit' => 20,
        'active' => true,
    ];
});
