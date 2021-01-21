<?php


namespace App\services;


use App\Models\Cart;
use App\Models\Product;
use App\repositories\CartRepository;
use App\repositories\Discountpository;
use App\repositories\ProductRepository;
use Illuminate\Support\Arr;

class CartService
{
    protected CartRepository  $cartRepository;
    protected  Discountpository $discountRepository;
    protected ProductRepository $productRepository;
  public  function __construct(CartRepository $cartRepository,Discountpository  $discountpository
      ,ProductRepository $productRepository)
  {
      $this->cartRepository=$cartRepository;
      $this->discountRepository=$discountpository;
      $this->productRepository=$productRepository;
  }
  public  function getAllCarts(){
      return $this->cartRepository->all();
  }
  public  function getCartById($id){
      return $this->cartRepository->getById($id);
  }
  public  function addDiscountToCart($id,$discount_code){
      $cart=$this->cartRepository->getById($id);
      $discount=$this->discountRepository->getById($discount_code);
      $cart->discount=[
          'code'=>$discount->discount_code,
          "discounted_amount"=>$discount->percentage_value * collect($cart->content)->sum('subtotal'),
          'value'=>$discount->percentage_value
      ];
      $cart->save();
  }
  public  function  addItemToCart($id,$product_id,$quantity){
      $cart=$this->cartRepository->getById($id);
      $product=$this->productRepository->getById($product_id);
      $cart->content=Arr::collapse([$cart->content,[$this->getArr($cart, $product, $quantity)]]);
      $cart->save();
  }
  public  function editItemInCart($id,$product_id,$row_id,$quantity){
      $cart=$this->cartRepository->getById($id);
      $collection=collect($cart->content);
      $new=$collection->map(function ($item) use ($row_id,$product_id,$quantity) {
          dump($row_id);
          if($item['row_id']==$row_id){
              $product=$this->productRepository->getById($product_id);
              $item= $this->getItem($row_id, $product, $quantity);
              dump($item);
          }

          return $item;
      });
      $cart->content=$new;
      $cart->save();
  }
  public  function  deleteItemFromcart($id,$row_id){
      $cart=$this->cartRepository->getById($id);
      $new=collect($cart->content)->filter(function ($item) use ($row_id){
          return $item['row_id']!=$row_id;
      });
      $cart->content=$new;
      $cart->save();
  }

  /****************************************/
    public function getItem($row_id, Product $product, int $quantity): array
    {
        return [
            'row_id' => $row_id,
            'product_id' => $product->product_id,
            'name' => $product->description,
            'qty' => $quantity,
            'price' => $product->price,
            'options' => $product->images_urls,
            'tax' => env('TAX')*$product->price,
            'subtotal' => ($product->price * $quantity) + ($product->price * env('TAX') * $quantity)
        ];
    }
    public function getArr(Cart $cart, Product $product, int $quantity): array
    {
        return [
            'row_id' => $cart->cart_id . '' . $product->product_id,
            'product_id' => $product->product_id,
            'name' => $product->description,
            'qty' => $quantity,
            'price' => $product->price,
            'options' => $product->images_urls,
            'tax' => env('TAX')*$product->price,
            'subtotal' => ($product->price * $quantity) + ($product->price * env('TAX') * $quantity)
        ];
    }

}
