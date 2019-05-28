<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Transport;
use Faker\Generator as Faker;

$marks = ['VAZ', 'GAZ', 'SOBOL', 'MAZ', 'LIAZ', 'GAZEL', 'Toyota', 'Nissan', 'OPEL', 'Beamer'];
$mileage = [23434, 343, 5634, 453245, 0];
$externalId = [1, 2, 3, 4];

$transportTypes = \App\TransportType::all()->toArray();
$transportStates = \App\TransportStatus::all()->toArray();

$factory->define(Transport::class, function (Faker $faker) use (
    $marks,
    $mileage,
    $externalId,
    &$transportTypes,
    &$transportStates
) {
    $randomTypeId = $transportTypes[array_rand($transportTypes)]['id'];
    $randomStateId = $transportStates[array_rand($transportStates)]['id'];

    return [
        'brand'     => $marks[array_rand($marks)],
        'mileage'   => $mileage[array_rand($mileage)],
        'driver_id' => function () {
            return factory(App\Driver::class)->create()->id;
        },
        'status_id' => $randomStateId,
        'type_id'   => $randomTypeId,
    ];
});

