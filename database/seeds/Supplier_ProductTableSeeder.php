<?php

use Illuminate\Database\Seeder;

class Supplier_ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                 $supplier_product=factory(App\Supplier_Product::class, 30)->create();

    }
}
