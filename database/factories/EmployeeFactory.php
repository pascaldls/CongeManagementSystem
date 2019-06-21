<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker, $attributes ) {
    $attributes = $attributes ?? [] ;
    return [
        'nom' =>  $faker->name(),
        'statut' => $attributes['statut'] ?? rand(0, 1)
    ];
});
