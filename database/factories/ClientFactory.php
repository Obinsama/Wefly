<?php

use Faker\Generator as Faker;

$factory->define(Wefly\Client::class, function (Faker $faker) {
    return [
        'nom_prenom'=>$faker->name(),
    ];
});
