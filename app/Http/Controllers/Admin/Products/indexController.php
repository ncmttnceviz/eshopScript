<?php

namespace App\Http\Controllers\Admin\Products;

use App\Helper\funcHelper;
use App\Helper\imageUpload;
use App\Helper\notificationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\editProductRequest;
use App\Http\Requests\Admin\productRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(productRequest $request)
    {
        $image = $request->file('image');
        $all   = $request->except('_token','image');
        $all['permalink'] = funcHelper::permalink($all['name']);
        $all['price'] = funcHelper::priceEdit($all['price']);

        $control = Product::where('permalink','=',$all['permalink'])->count();
        if ($control <= 0)
        {

        $uploadproduct = Product::create($all);
        $lastId = Product::latest()->first()->id;
        if ($uploadproduct)
        {
            $uploadimage = imageUpload::multiImageUpload($lastId,$all['permalink'],$image);

            if ($uploadimage)
            {
                return notificationHelper::sendNotification('success','create');
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }

        }


        }
        else
        {
            return notificationHelper::sendNotification('error','recurrent');
        }


    }

    public function edit($id)
    {
        $control = Product::where('id','=',$id)->count();
        if ($control>0)
        {
            $data = Product::where('id','=',$id)->get();
            return view('admin.product.edit',['data'=>$data]);
        }
        else
        {
            return notificationHelper::sendNotification('error','nodata');
        }


    }

    public function update(editProductRequest $request)
    {
        $id = $request->route('id');
        $control = Product::where('id','=',$id)->count();
        if ($control >0)
        {
            $all = $request->except('_token');
            $all['permalink'] = funcHelper::permalink($all['name']);
            $all['price'] = funcHelper::priceEdit($all['price']);

            $update = Product::where('id','=',$id)->update($all);
            if ($update)
            {
                return notificationHelper::sendNotification('success','update');
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }
        }
        else
        {
            return notificationHelper::sendNotification('error','nodata');
        }
    }

    public function publishStatus($id,$status)
    {
        $control = Product::where('id','=',$id)->count();
        if ($control>0)
        {
            $publish = Product::where('id','=',$id)->update([
                "publish" => $status
            ]);
            if ($publish)
            {
                return notificationHelper::sendNotification('success','delete');
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }
        }
        else
        {
            return notificationHelper::sendNotification('error','nodata');
        }

    }

    public function trendHotStatus($id,$status)
    {
        $control = Product::where('id','=',$id)->count();
        if ($control>0)
        {
            $update = Product::where('id','=',$id)->update([
                "status" => $status
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

    public function image($id)
    {
            $data = ProductImage::where('productID','=',$id)->get();
            return  view('admin.product.editimage',['data'=>$data,"productID"=>$id]);

    }

    public function uploadImage(Request $request)
    {
        $id = $request->route('id');
        $all = $request->except('_token');

        $upload = imageUpload::multiImageUpload($id,$all['name'],$request->file('image'));

        if ($upload)
        {
            return notificationHelper::sendNotification('success','create');
        }
        else
        {
            return notificationHelper::sendNotification('error');
        }
    }

    public function deleteImage($id)
    {
        $control = ProductImage::where('id','=',$id)->count();
        if ($control>0)
        {
            $delete = ProductImage::where('id','=',$id)->delete();
            if ($delete)
            {
                return notificationHelper::sendNotification('success','delete');
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }
        }
        else
        {
            return notificationHelper::sendNotification('error','nodata');
        }
    }
}
