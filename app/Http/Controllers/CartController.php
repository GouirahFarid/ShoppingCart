<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;

use App\services\CartService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    protected  CartService $cartService;
    public  function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
    }

    public function index()
    {
        return CartResource::collection($this->cartService->getAllCarts());
    }

    public  function addDiscount(Request  $request,$id){
        $this->cartService->addDiscountToCart($id,$request->discount_code);
        return CartResource::collection($this->cartService->getAllCarts());
    }
    public function show($id)
    {
        return new  CartResource($this->cartService->getCartById($id));
    }
    public function addItem(Request $request, $id)
    {
        $this->cartService->addItemToCart($id,$request->product_id,$request->quantity);
        return CartResource::collection($this->cartService->getAllCarts());
    }
    public function update(Request $request, $id)
    {
        $this->cartService->editItemInCart($id,$request->product_id,$request->row_id,$request->quantity);
        return CartResource::collection($this->cartService->getAllCarts());
    }
    public function destroy(Request  $request,$id)
    {
        $this->cartService->deleteItemFromcart($id,$request->row_id);
        return CartResource::collection($this->cartService->getAllCarts());
    }

}
