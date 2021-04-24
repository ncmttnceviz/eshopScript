<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function index($permalink)
    {
        $control = Categories::where('permalink','=',$permalink)->count();
        if ($control>0)
        {
            $hit = Categories::where('permalink','=',$permalink)->increment('hit');
            $data = Categories::where('permalink','=',$permalink)->get();
            if ($data[0]["type"] == 0)
            {
                $getSubCategories = Categories::select('mainCategoryID','id','permalink')->where('mainCategoryID','=',$data[0]['id'])->get();

                $array = [$data[0]['id']];
                foreach ($getSubCategories as $key => $value)
                {
                  array_push($array,$value['id']);

                }
                $products = DB::table('products')->whereIn('categoryID',$array)
                    ->where('publish','=',1)
                    ->get();

            }
            else
                {
                $products = Product::where('categoryID','=',$data[0]['id'])
                    ->where('publish','=',1)
                    ->get();
                }

            return view('front.category',['data'=>$data,'products'=>$products]);
        }
        else
        {
            return abort(404);
        }
    }
}
