<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OperationReport;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(OperationReport::class, function (Faker $faker) {
    return [
        'diesel' => $faker->numberBetween(20, 150),
        'type' => Arr::random(\App\Enumerations\Operation::all),
        'machinery' => Arr::random(\App\Enumerations\Machinery::all),
        'machinery_model' => $faker->word(3),
        'observation' => $faker->paragraph(2),
        'field_id' => function(){
            return factory(\App\Field::class)->create()->id;
        },
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        }
    ];
});
