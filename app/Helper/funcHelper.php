<?php
namespace App\Helper;
use App\Models\Adress;
use App\Models\Categories;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SiteConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;


class funcHelper
{
    static  function permalink($string)
    {
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        return $string;
    }

    static function priceEdit($price)
    {
        $data = str_replace(',','.',$price);
        return $data;
    }

    static function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($key),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }

    static function encodeAppName($appname)
    {
        $data = str_replace(' ','_',$appname);
        return $data;
    }

    static function decodeAppName($appname)
    {
        $data = str_replace('_',' ',$appname);
        return $data;
    }

    static function getMeta($route,$meta)
    {
        $route = str_replace('front.','',$route);
        $permalink = Request::route('permalink');
        if ($route == 'index' or $route == 'aboutus' or $route == 'termsconditions' or $route == 'privacypolicy' or $route == 'faq' or $route == 'contactus')
        {
          return SiteConfig::getConfig($meta);
        }
        elseif ($route == "category")
        {

            return Categories::getMeta($permalink,$meta);
        }
        else if ($route == "product")
        {
            return Product::getMeta($permalink,$meta);
        }
    }


}

