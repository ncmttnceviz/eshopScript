<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SiteConfig extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getConfig($config)
    {
        if (! App::runningInConsole()) {
            $query = SiteConfig::where('id','=',1)->get();
            if($query){
                return $query[0][$config];
            }
        }
    }
}
