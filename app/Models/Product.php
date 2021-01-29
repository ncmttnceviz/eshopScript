<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getField($id,$field)
    {
       $query = Product::where('id','=',$id)->get();
       return $query[0][$field];
    }

    static function getMeta($permalink,$meta)
    {
        $query = Product::select('name','metaTitle','metaDescription','metaKeywords')->where('permalink','=',$permalink)->get();
        return $query[0][$meta];
    }
}
