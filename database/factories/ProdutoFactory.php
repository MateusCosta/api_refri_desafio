<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produto;
use Faker\Generator as Faker;





$factory->define(Produto::class, function (Faker $faker) {
 
    return [
        'marca_id' => $faker->numberBetween($min = 1, $max = 1),
        'tipo_id' => $faker->numberBetween($min = 1, $max = 3),
        'sabor_id' => $faker->numberBetween($min = 1, $max =1),
        'unidade_id' => $faker->numberBetween($min = 1, $max = 2),
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'cover_image' => $faker->imageUrl($width = 640, $height = 480),
        'preco' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 10),
        'quantidade' => $faker->numberBetween($min = 1, $max = 100),
        'ativo' => $faker->boolean()
        
    ];
});
