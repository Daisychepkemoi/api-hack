<?php

use Illuminate\Database\Seeder;

class Order_DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $Order_detail=factory(App\Order_Detail::class, 5)->create();
    }
}
