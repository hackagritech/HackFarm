<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Field;
use Faker\Generator as Faker;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->numberBetween(0,500),
        'area' => $faker->unique()->numberBetween(500,5000)
    ];
});
