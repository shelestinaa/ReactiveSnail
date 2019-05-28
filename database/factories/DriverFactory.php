<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Driver;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'name'       => $faker->name,
        'birth_date' => $faker->dateTime('2000-12-31'),
    ];
});
