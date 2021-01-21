<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=new Product();
        $product->product_id="pro123456";
        $product->price=300;
        $product->description='Product_A';
        $product->images_urls=[
            'image_a'=>'images/image_a.jpg',
            'image_b'=>'images/image_b.jpg'
        ];
        $product->save();

        $product2=new Product();
        $product2->product_id="pro987654";
        $product2->price=400;
        $product2->description='Product_B';
        $product2->images_urls=[
            'image_c'=>'images/image_c.jpg',
            'image_d'=>'images/image_d.jpg'
        ];
        $product2->save();
        $product3=new Product();
        $product3->product_id="pro1456";
        $product3->price=152;
        $product3->description='Product_c';
        $product3->images_urls=[
            'image_e'=>'images/image_e.jpg',
            'image_f'=>'images/image_f.jpg'
        ];
        $product3->save();

        $discount=new  Discount();
        $discount->discount_code='farid2021';
        $discount->percentage_value=0.2;
        $discount->save();
        $cart=new Cart();
        $cart->cart_id='cart12345';
        $cart->content=
        [[
                'row_id'=>'row12345',
                'product_id'=>$product->product_id,
                'name'=>$product->description,
                'qty'=>2,
                'price'=>$product->price,
                'options'=>$product->images_urls,
                'tax'=>env('TAX')* $product->price,
                'subtotal'=>($product->price*2)+($product->price*env('TAX')*2)
            ],
            [
                'row_id'=>'row6789',
                'product_id'=>(string)$product2->product_id,
                'name'=>$product2->description,
                'qty'=>3,
                'price'=>$product2->price,
                'options'=>$product2->images_urls,
                'tax'=>env('TAX')* $product->price,
                'subtotal'=>($product2->price*2)+($product2->price*env('TAX')*2)
            ]
        ];
        $cart->save();
    }
}
