<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'price' => $faker->biasedNumberBetween(200,5000),
        'category_id' => $faker->biasedNumberBetween(1,3),
        'created_at' => $faker->dateTime($max='now'),
        'updated_at' => $faker->dateTime($max='now')
    ];
});
