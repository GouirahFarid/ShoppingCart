<?php


namespace App\repositories;



use App\Models\Cart;

class CartRepository
{
    protected Cart  $cart;
    public  function  __construct( Cart $model)
    {
        $this->cart=$model;
    }
    public  function all(){
        return $this->cart->all();
    }
    public  function  getById($id){
        return $this->cart->findOrFail($id);
    }
}
