<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $casts=[
        'content'=>'array',
        'discount'=>'array'
    ];
    protected $primaryKey = 'cart_id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded=[];
}
