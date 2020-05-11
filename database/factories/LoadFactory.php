<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Load::class, function (Faker $faker) {
    return [
        'city_from_id' => City::inRandomOrder()->first()->id,
        'city_to_id' => City::inRandomOrder()->first()->id,
        'name' => [
            'en' => $faker->name
        ],
        'volume' => $faker->randomNumber(2),
        'photo' => $faker->image('public/storage/images',10,10, null, false),
    ];
});
