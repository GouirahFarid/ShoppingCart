<?php


namespace App\repositories;



use App\Models\Cart;
use App\Models\Product;

class ProductRepository
{
    protected Product  $product;
    public  function  __construct( Product $product)
    {
        $this->product=$product;
    }
    public  function all(){
        return $this->product->all();
    }
    public  function  getById($id){
        return $this->product->findOrFail($id);
    }
}
