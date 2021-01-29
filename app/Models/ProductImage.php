<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function singleImage($product)
    {
        $query = ProductImage::select('path')->where('productID','=',$product)->limit(1)->first();

        return $query['path'];
    }

    static function multiImage($product)
    {}
}
