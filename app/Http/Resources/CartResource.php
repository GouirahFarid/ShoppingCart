<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public static $wrap = 'cart';
    public function toArray($request)
    {
        return [
            'identifier'=>$this->cart_id,
             'items'=>$this->content,
            'discount'=>$this->discount!=null ? $this->discount:'there is no discount right now',
            "summary"=>[
                "discount_amount"=>$this->discount!=null ?$this->discount['discounted_amount']:0,
                "tax"=>collect($this->content)->sum('tax'),
                "total_amount"=>collect($this->content)->sum('subtotal')-($this->discount!=null ?$this->discount['discounted_amount']:0)
            ]

        ];
    }
}
