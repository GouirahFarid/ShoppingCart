<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $casts=[
        'images_urls'=>'array',
    ];
    protected $primaryKey = 'product_id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded=[];
}
