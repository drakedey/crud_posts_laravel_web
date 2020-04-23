<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'name' -> $faker->name,
        'value' -> $faker->randomFloat(2, 0, 10000),
        'description' -> $faker->text,
        'user_id'-> rand(1, 10),
    ];
});
