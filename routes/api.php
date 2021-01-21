<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*Route::get('/products/{id}',function($id){
    dump(Product::find($id)->images_urls);
    dump(env('TAX'));
   return new ProductResource(Product::find($id));
});
Route::get('/products',function(){
    return ProductResource::collection(Product::all());
});*/
Route::apiResource('/products',ProductController::class);
Route::post('/carts/{cart}',[CartController::class,'addItem']);
Route::post('/carts/{cart}/discount',[CartController::class,'addDiscount']);
Route::apiResource('/carts',CartController::class);
