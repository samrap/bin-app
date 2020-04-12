<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->state(Item::class, 'claimed', function (Faker $faker) {
    return [
        'claimed_by' => $faker->email,
    ];
});
