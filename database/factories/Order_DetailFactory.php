<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Order_Detail::class, function (Faker\Generator $faker) {
	// $Orders_id=App\Order::pluck('id');
	// $products_id=App\Product::pluck('id');

	
	$products_id=App\Product::pluck('id');
	$Orders_id=App\Order::pluck('id');
    return [
		// 'user_id' => 1,  
		// 'orders_id' => $faker->randomElement([10,20,30]),
		'orders_id' => $faker->randomElement($Orders_id),
		'products_id' => $faker->randomElement($products_id),
    ];
});
