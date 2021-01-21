<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public static $wrap = 'cart';
    public function toArray($request)
    {
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->description,
            'price' => $this->price,
            'images_urls' => $this->images_urls,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'product'=>$this->id.''.$this->description,
        ];
    }
}
