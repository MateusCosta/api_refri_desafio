<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tipo;
use Faker\Generator as Faker;

$factory->define(Tipo::class, function (Faker $faker) {
    $tipos = ['PET', 'Lata', 'Garrafa'];
    return [
        'tipo' => $faker->randomElement($tipos)
    ];
});
