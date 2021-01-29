<?php

namespace App\Http\Controllers\Front;

use App\Helper\cartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Cookie;

class productController extends Controller
{
    public function index($permalink)
    {
        $hit = Product::where('permalink','=',$permalink)
            ->where('publish','=',1)
            ->increment('hit');

        $product = DB::table('products')
            ->select('products.id','name','price','stock','path','metaDescription')
            ->Join('product_images','products.id','=','product_images.productID')
            ->where('permalink','=',$permalink)
            ->get();

       return view('front.product',['data'=>$product]);
    }

}
