<?php

namespace App\Http\Controllers\Front;

use App\Helper\notificationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\contactRequest;
use App\Mail\mailController;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Infopage;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SiteConfig;
use http\Message\Body;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class indexController extends Controller
{

    public function index()
    {
        $banners = Banner::all();

        $topviewed = DB::table('products')
            ->select('products.id','products.name','products.publish','products.hit','products.status','products.amountPurchased','products.price','products.numberOfSales','products.permalink','product_images.path')
            ->join('product_images','product_images.productID','=','products.id')
            ->groupBy('products.id')
            ->orderByDesc('products.hit')
            ->where('products.publish','=',1)
            ->limit(4)
            ->get();

        $bestseller = DB::table('products')
            ->select('products.id','products.name','products.publish','products.hit','products.status','products.amountPurchased','products.price','products.numberOfSales','products.permalink','product_images.path')
            ->join('product_images','product_images.productID','=','products.id')
            ->groupBy('products.id')
            ->orderByDesc('products.amountPurchased')
            ->where('products.publish','=',1)
            ->limit(4)
            ->get();

        $popularones = DB::table('products')
            ->select('products.id','products.name','products.publish','products.hit','products.status','products.amountPurchased','products.price','products.numberOfSales','products.permalink','product_images.path')
            ->join('product_images','product_images.productID','=','products.id')
            ->groupBy('products.id')
            ->orderByDesc('products.numberOfSales')
            ->where('products.publish','=',1)
            ->limit(4)
            ->get();

        $trending  = DB::table('products')
            ->select('products.id','products.name','products.publish','products.hit','products.status','products.amountPurchased','products.price','products.numberOfSales','products.permalink','product_images.path')
            ->join('product_images','product_images.productID','=','products.id')
            ->groupBy('products.id')
            ->where('products.status','=',1)
            ->where('products.publish','=',1)
            ->get();

        $hotitems  =  DB::table('products')
            ->select('products.id','products.name','products.publish','products.hit','products.status','products.amountPurchased','products.price','products.numberOfSales','products.permalink','product_images.path')
            ->join('product_images','product_images.productID','=','products.id')
            ->groupBy('products.id')
            ->where('status' ,'=',2)
            ->where('products.publish','=',1)
            ->get();


        return view('front.index',['banners'=>$banners,'topviewed'=>$topviewed,'bestseller'=>$bestseller,'popularones'=>$popularones,'trending'=>$trending,'hot'=>$hotitems]);
    }


    public function aboutus()
    {
        $data = SiteConfig::getConfig('aboutus');
        return view('front.aboutus',['data'=>$data]);
    }

    public function termsConditions()
    {
        $data = SiteConfig::getConfig('termsConditions');
        return view('front.termsconditions',['data'=>$data]);
    }

    public function privacyPolicy()
    {
        $data = SiteConfig::getConfig('privacyPolicy');
        return view('front.privacypolicy',['data'=>$data]);
    }

    public  function faq()
    {
        $data = Faq::all();
        return view('front.faq',['data'=>$data]);
    }

    public function contact()
    {
        return view('front.contactus');
    }

    public function contactMail(contactRequest $request)
    {
        $array = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phonenumber'=>$request->input('phonenumber'),
            'text'=>$request->get('message')
        ];

        $viev = "front.mail";
        $subject = __('Contact Us');
        $to = env('MAIL_FROM_ADDRESS');
        Mail::send(new mailController($to,$subject,$viev,$array));

        return notificationHelper::sendNotification('success','create');

    }
}
