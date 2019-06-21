<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Conge;
use Faker\Generator as Faker;

$factory->define(Conge::class, function (Faker $faker, $attributes ) {

    return [
        'employee_id' => $attributes['employee_id'],
        'debut' => '',
        'fin' => '',
        'statut' => $attributes['statut'] ?? [
            'demande en attente',
            'congé approuvé',
            'congé refusé',
        ][ rand(0, 2) ],
        'Commentaire' =>  $faker->text() ,
    ];
});
