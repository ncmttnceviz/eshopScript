<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Helper\imageUpload;
use App\Helper\notificationHelper;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $categories = Categories::select('name','permalink')->get();
        $products   = Product::select('name','permalink')->get();
        return view('admin.banner.index',['categories'=>$categories,'products'=>$products]);
    }

    public function store(Request $request)
    {
        $banner = $request->input('banner');
        $title = $request->input('Title');
        $text = $request->input('Text');
        $route = $request->input('Route');
        $link = $request->input('Link');
        $image = $request->file('image');

        if ($image == null)
        {
            $getimage = Banner::select($banner)
                ->where('id','=',1)->get();

            $uploadimage = $getimage[0]->$banner;
        }
        else
        {
            $uploadimage = imageUpload::bannerUpload($banner,$image);
        }

        $update = Banner::where('id','=',1)
        ->update([
            $banner => $uploadimage,
            $banner.'Title' => $title,
            $banner.'Text' => $text,
            $banner.'Route' => $route,
            $banner.'link' => $link,
        ]);

        if ($update)
        {
            return notificationHelper::sendNotification('success','update');
        }
        else
        {
            return notificationHelper::sendNotification('error');
        }

    }
}
