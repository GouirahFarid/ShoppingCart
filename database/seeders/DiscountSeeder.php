<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discount=new Discount();
        $discount->discount_code='TestDevinweb';
        $discount->percentage_value=0.1;
        $discount->save();
    }
}
