<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getConfig($config)
    {
       $query = SiteConfig::where('id','=',1)->get();

        return $query[0][$config];
    }
}
