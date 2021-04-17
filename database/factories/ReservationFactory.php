<?php

use Faker\Generator as Faker;

$factory->define(Wefly\Reservation::class, function (Faker $faker) {
    return [
        'vol_id'=>$faker->unique()->numberBetween(1,10),
        'client_id' => $faker->unique()->numberBetween(1,10),
        'nom_prenom' => $faker->name(),
        'numero' => $faker->unique()->realText($faker->numberBetween(1,100)),
        'date' => $faker->date('Y-m-d'),
        'heure' => $faker->time('H:i:s'),
    ];
});
