<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
		// 'user_id' => 1,  
		'order_number' => now().Str::random(2),
		// 'description' => $faker->sentence(10),
		// 'quantity' => $faker->randomNumber(),
    ];
});