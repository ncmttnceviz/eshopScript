<?php

namespace App\Http\Controllers\Front;

use App\Helper\cartHelper;
use App\Helper\notificationHelper;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Basket;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class cartController extends Controller
{

     public  function setToken()
     {
        if (session('basket') == null)
        {
            $token = md5(uniqid(rand(), true));
            Session::get('basket');
            Session::put('basket',$token);
        }
        return session('basket');
     }


    public function addToCart(Request $request)
    {

        $product = $request['product'];
        $total = $request['total'];


        $control = Basket::where('userID','=',Auth::id())
            ->Where('productID','=',$product)
            ->orWhere( 'token','=',$this->setToken())
            ->Where('productID','=',$product)
            ->count();

        if ($control == 0)
        {
                $insert = Basket::create([
                    'userID' => Auth::id(),
                    'productID' => $product,
                    'numberOfProducts' => $total,
                    'token' => $this->setToken()
                ]);
                if ($insert)
                {
                    return notificationHelper::sendNotification('success','addcart');
                }
                else
                {
                    return  notificationHelper::sendNotification('error');
                }
        }
        else
        {
           return   $this->updateCart($product,$total);
        }

    }


    public function updateCart($product,$total)
    {
        $updateproduct = Basket::where( 'userID','=',Auth::id())
            ->where('productID','=',$product)
            ->orWhere('token','=',$this->setToken())
            ->where('productID','=',$product)
            ->update([
                'numberOfProducts' => $total
            ]);

        if ($updateproduct)
        {
            return notificationHelper::sendNotification('success','updatecart');
        }
        else
        {
            return notificationHelper::sendNotification('error');
        }

    }


    public function deleteItem($id)
    {
        $control =  $control = Basket::where('userID','=',Auth::id())
            ->orWHere('token','=',$this->setToken())
            ->count();

        if ($control>0)
        {
            $delete = Basket::where('userID','=',Auth::id())
                ->where('productID','=',$id)
                ->orWHere('token','=',$this->setToken())
                ->where('productID','=',$id)
                ->delete();

            if ($delete)
            {
                return notificationHelper::sendNotification('success','delete');
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }
        }
    }

    public function checkoutCart()
    {

        if (Auth::user() != null)
        {
            $data = DB::table('baskets')
                ->select('baskets.userID','baskets.productID', 'baskets.numberOfProducts', 'products.name', 'products.permalink' ,'products.metaDescription', 'products.price', 'product_images.path')
                ->join('products','products.id','=','baskets.productID')
                ->join('product_images','product_images.productID','=','baskets.productID')
                ->groupBy('baskets.productID')
                ->where('baskets.userID','=',Auth::id())
                ->get();
        }
        else
        {
            $data = DB::table('baskets')
                ->select('baskets.token','baskets.productID', 'baskets.numberOfProducts', 'products.name', 'products.permalink' ,'products.metaDescription', 'products.price', 'product_images.path')
                ->join('products','products.id','=','baskets.productID')
                ->join('product_images','product_images.productID','=','baskets.productID')
                ->groupBy('baskets.productID')
                ->where('baskets.token',session('basket'))
                ->get();
        }



            $payment = cartHelper::getCartTotal($data);

            return view('front.cart',['data'=>$data,"payment"=>$payment]);
    }

    public function clearCart()
    {
        $clean = Basket::where('userID','=',Auth::id())
            ->orWhere('token','=',$this->setToken())
            ->delete();

        if ($clean)
        {
            return notificationHelper::sendNotification('success','clearcart');
        }
        else
        {
            return notificationHelper::sendNotification('error');
        }
    }

    public function completeShopping()
    {

        $addresscontrol = Address::where('userID','=',Auth::id())->count();
        if ($addresscontrol == 0)
        {
            return redirect()->route('front.account.addAddress');
        }

        if (Auth::user()->telephoneNumber == "")
        {
            return redirect()->route('front.account')->with(['status'=>"alert alert-danger",'message'=>'Fill Your Missing Information']);
        }

        $cartcontrol = Basket::where('userID','=',Auth::id())
            ->orwhere('token','=',$this->setToken())
            ->count();

        if ($cartcontrol > 0)
        {
            $userdata = Address::where('userID','=',Auth::id())
                ->get();
            return view('front.completeshopping',['data'=>$userdata]);
        }
        else
        {
            return redirect('/');
        }

    }

    public function completeShoppingStore(Request $request)
    {

        $address = $request['address'];
        $control = Address::where('id','=',$address)
            ->where('userID','=',Auth::id())
            ->count();

        if ($control>0) {

            $addressCheck = Address::where('id','=',$address)->get();

            if (($addressCheck[0]->addressDescription == "") or ($addressCheck[0]->province = "") or ($addressCheck[0]->district == "") or  ($addressCheck[0]->zipCode == "") or  ($addressCheck[0]->country == ""))
            {
                return  redirect()->route('front.account')->with(['status'=>'alert alert-danger','message'=>"Complete the missing parts of the address information"]);
            }

            $addAddress = Basket::where('userID','=',Auth::id())
                ->update([
                    'addressID' => $address
                ]);

            $products = Basket::where('userID', '=', Auth::id())->get();

          foreach ($products as $key => $value) {
                $numberOfProductsOrdered = Basket::select('numberOfProducts', 'productID')->where('productID', '=', $value->productID)->get();
                $stock = Product::select('id', 'stock', 'permalink')->where('id', '=', $value->productID)->get();

                if ($numberOfProductsOrdered[0]->numberOfProducts > $stock[0]->stock) {
                    $deleteItemInCart = Basket::where('productID', '=', $numberOfProductsOrdered[0]->productID)
                        ->where('userID', '=', Auth::id())
                        ->delete();
                    return redirect()->route('front.product', ['permalink' => $stock[0]->permalink])->with(['status' => 'alert alert-danger', 'message' => 'This product is out of stock']);
                }
            }
            $orderNumber = Auth::id().$products[0]->token;
            $getCartTotal = cartHelper::getCartTotal($products);
            $getOrderData = [];

            foreach ($products as $key => $value) {
                $dropOffStock = Product::where('id', '=', $value->productID)
                    ->decrement('stock', $value->numberOfProducts);
                $numberOfSaleStat = Product::where('id', '=', $value->productID)
                    ->increment('numberOfSales');
                $amountPurchasedStat = Product::where('id', '=', $value->productID)
                    ->increment('amountPurchased', $value->numberOfProducts);

                $data = DB::table('products')
                    ->select('products.id','products.name as product','products.categoryID','products.price',
                    'categories.name as category','categories.id')
                    ->join('categories','categories.id','=','products.categoryID')
                    ->where('products.id','=',$value->productID)
                    ->get();

               array_push($getOrderData,[
                   "orderNumber" => $value->token,
                   'productID'=>$value->productID,
                   'productName'=>$data[0]->product,
                   'category'=>$data[0]->category,
                   "price" =>cartHelper::getTotalPrice($data[0]->price,$value->numberOfProducts),
                   "totalPrice" =>cartHelper::getCartTotal($products),
                   "address" => $address
               ]);

            }

            $getAddressData = Address::where('id','=',$address)->get();
            $payment = new PaymentController($getOrderData,$getAddressData[0]);
            return  $payment->index();

        }

    }


}
