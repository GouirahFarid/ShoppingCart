<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $primaryKey = 'discount_code';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded=[];
}
