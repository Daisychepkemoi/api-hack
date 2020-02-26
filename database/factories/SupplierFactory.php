<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
		// 'user_id' => 1,  
		'name' => Str::random(10),
    ];
});
