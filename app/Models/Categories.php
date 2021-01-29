<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getMeta($permalink,$meta)
    {
        $query = Categories::select('name','metaTitle','metaDescription','metaKeywords')->where('permalink','=',$permalink)->get();
        return $query[0][$meta];
    }

}
