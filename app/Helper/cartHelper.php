<?php


namespace App\Helper;


use App\Models\Basket;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shipping;
use App\Models\SiteConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class cartHelper
{


    static function countCart()
    {
        if (Auth::user() != null)
        {
            $count = Basket::where('userID','=',Auth::id())
                ->count();
        }
        else
        {
            $count = Basket::Where('token','=',session('basket'))
                ->count();
        }
        return $count;
    }


    static function getTotalPrice($price,$quantity)
    {
        $total = $price*$quantity;
        return $total;
    }

    static function getCartTotal($data)
    {
         $freeShipping = SiteConfig::getConfig('freeShippingThreshold');
         $shippingPrice =  SiteConfig::getConfig('shippingPrice');

         $response = [];
         $subtotal = 0;
         $shipping = 0;
         $carttotal = 0;
        foreach ($data as $key => $value)
        {
            $product = Product::select('price')->where('id','=',$value->productID)->get();
            $producttotal = $product[0]->price * $value->numberOfProducts;

            $subtotal += $producttotal;
        }

            if ($subtotal >= $freeShipping )
            {
                $shipping  = 0;
                $carttotal = $subtotal;
            }else
            {
                $shipping  = $shippingPrice;
                $carttotal = $subtotal + $shippingPrice;
            }

            $push = array_push($response, ["subTotal" =>$subtotal,"shippingPrice"=>$shipping,"cartTotal"=>$carttotal]);

            return $response;
    }

    static function addOrder($status,$basketToken)
    {
        $control = Basket::where('token','=',$basketToken)->count();

        if ($control >0)
        {

        $products = Basket::where('token', '=', $basketToken)->get();

        if ($status == "success") {
            $getCartTotal = cartHelper::getCartTotal($products);

            foreach ($products as $key => $value) {
                $insert = Orders::create([
                    "userID" => $value->userID,
                    "orderNumber" => $value->token,
                    'deliveryAddress' => $value->addressID,
                    "numberOfProducts" => $value->numberOfProducts,
                    "ProductID" => $value->productID,
                    "price" => Product::getField($value->productID, 'price'),
                    "totalPrice" => cartHelper::getTotalPrice(Product::getField($value->productID, 'price'), $value->numberOfProducts),
                ]);
            }

            $shippingData = $getCartTotal;
            $shippingData[0]['orderNumber'] =  $products[0]->token;
            $insertShipping = Shipping::create($shippingData[0]);
            if ($insert) {
                $clearcart = Basket::where('token', '=',  $basketToken)
                    ->delete();

                Session::get('basket');
                Session::put('basket', 0);

                return true;
            }
            else
            {
                return  false;
            }
        }
        else
        {
            foreach ($products as $key => $value)
            {
                $addStock = Product::where('id', '=', $value->productID)
                    ->increment('stock', $value->numberOfProducts);
                $numberOfSaleStat = Product::where('id', '=', $value->productID)
                    ->decrement('numberOfSales');
                $amountPurchasedStat = Product::where('id', '=', $value->productID)
                    ->decrement('amountPurchased', $value->numberOfProducts);
            }
            return false;
        }
        }
        else
        {
            return false;
        }
    }

}
