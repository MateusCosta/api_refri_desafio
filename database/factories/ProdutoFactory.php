<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Produto::class, function (Faker $faker) {
    $Marcas = ['Fanta', 'Coca-Cola', 'São Gerardo', 'Kuat','Sukita', 'Guaraná Antártica', 'Pepsi','Sprite','Dolly'];
    $Sabores = ['Cola', 'Guaraná', 'Cajú','Laranja','Uva','Limão','Café','Lima','Baunilha'];
    $Unidades = ['mL', 'L'];
    $Tipos = ['PET', 'Lata', 'Garrafa'];
    $min = 0.1;
    $max = 10;
    return [
        'marca' => $faker->randomElement($Marcas ),
        'tipo' => $faker->randomElement($Tipos),
        'sabor' => $faker->randomElement($Sabores),
        'unidade' => $faker->randomElement($Unidades ),
        'preco' => $faker->numberBetween($min = 0.1, $max = 10),
        'quantidade' => $faker->numberBetween($min = 1, $max = 100)
        
    ];
});
