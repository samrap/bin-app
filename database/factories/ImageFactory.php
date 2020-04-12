<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url' => 'https://via.placeholder.com/1200x720',
        'featured' => false,
    ];
});

$factory->state(Image::class, 'featured', [
    'featured' => true,
]);
