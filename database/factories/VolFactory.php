<?php

use Faker\Generator as Faker;

$factory->define(Wefly\Vol::class, function (Faker $faker) {
    return [
        'aeroport_dep'=>$faker->city,
        'aeroport_arr' => $faker->city,
        'date_dep' => $faker->date('d-m-Y'),
        'heure_dep' => $faker->time('H:i:s'),
        'date_arr' => $faker->date('d-m-Y','+2 days'),
        'heure_arr' => $faker->time('H:i:s','+24 hours'),
    ];
});
