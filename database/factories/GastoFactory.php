<?php

use Faker\Generator as Faker;

$factory->define(\App\Gasto::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text,
        'valor' => $faker->randomFloat(3, 10, 300)
    ];
});
