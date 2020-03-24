<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
		// 'user_id' => 1,  
		'name' => $faker->sentence(5),
		'description' => $faker->sentence(10),
		'quantity' => $faker->randomNumber(),
    ];
});