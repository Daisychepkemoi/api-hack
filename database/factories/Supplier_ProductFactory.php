<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Supplier_Product::class, function (Faker\Generator $faker) {
	
		// $Supplie = [10,20,50];
	$products_id=App\Product::pluck('id');
	$Supplier_id=App\Supplier::pluck('id');
	
    return [
		// 'user_id' => 1,  
		// 'suppliers_id' => $faker->randomElement([10,20,30,40]),
		'suppliers_id' => $faker->randomElement($products_id),
		'products_id' => $faker->randomElement($Supplier_id),
		// 'products_id' => $faker->randomElement([11,21,30,40]),
    ];
});
