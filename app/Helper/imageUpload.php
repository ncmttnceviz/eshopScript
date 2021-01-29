<?php


namespace App\Helper;


use App\Models\ProductImage;
use Intervention\Image\Facades\Image;

class imageUpload
{

    static function multiImageUpload($id,$names,$images){
        $dir      = 'images/';
        foreach ($images as $image)
        {
            $name = $names.''.rand(0,9999);
            $filename = $name.".".$image->getClientOriginalExtension();
            $path = $dir.$filename;
            $upload = Image::make($image->getRealPath())->resize(550,750)->save($path);

            if ($upload) {
                ProductImage::create(
                    [
                        'productID' => $id,
                        'path' => $path
                    ]
                );


            }
            else
            {
                return false;
            }

        }

        return true;
    }

    static function singleImageUpload($name,$image){
            $dir      = 'images/';
            $filename = $name.".".$image->getClientOriginalExtension();
            $path = $dir.$filename;
            $upload = Image::make($image->getRealPath())->resize(110,32)->save($path);
        if ($upload)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    static function bannerUpload($name,$image){
        $dir      = 'images/';
        $filename = $name.".".$image->getClientOriginalExtension();
        $path = $dir.$filename;
        $upload = Image::make($image->getRealPath())->save($path);
        if ($upload)
        {
            return $path;
        }
        else
        {
            return false;
        }
    }



}
