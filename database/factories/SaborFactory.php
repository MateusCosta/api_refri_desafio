<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sabor;
use Faker\Generator as Faker;

$factory->define(Sabor::class, function (Faker $faker) {
    
    $sabores = ['Cola', 'Guaraná', 'Cajú','Laranja','Uva','Limão','Café','Lima','Baunilha'];
    return [
        'nome' => $faker->randomElement($sabores)
    ];
});
