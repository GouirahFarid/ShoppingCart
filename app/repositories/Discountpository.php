<?php


namespace App\repositories;



use App\Models\Discount;

class Discountpository
{
    protected Discount  $discount;
    public  function  __construct( Discount $discount)
    {
        $this->discount=$discount;
    }
    public  function all(){
        return $this->discount->all();
    }
    public  function  getById($id){
        return $this->discount->findOrFail($id);
    }
}
