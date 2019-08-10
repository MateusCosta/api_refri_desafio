<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Marca;
use Faker\Generator as Faker;

$factory->define(Marca::class, function (Faker $faker) {
    
    $marcas = ['Fanta', 'Coca-Cola', 'São Gerardo', 'Kuat','Sukita', 'Guaraná Antártica', 'Pepsi','Sprite','Dolly'];
    return [
        'nome' => $faker->company()
    ];
});
