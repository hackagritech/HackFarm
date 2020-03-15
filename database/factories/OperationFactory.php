<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Operation;
use Faker\Generator as Faker;

$factory->define(Operation::class, function (Faker $faker) {


    return [
        'start_date' => \Carbon\Carbon::now(),
        'end_date' => null,
        'status' => true,
        'operation_id' => function(){
            return factory(\App\OperationReport::class)->create()->id;
        }
    ];
});
