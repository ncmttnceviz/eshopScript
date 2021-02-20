<?php

namespace App\Http\Controllers\Front;

use App\Helper\notificationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\addressesRequest;
use App\Models\Address;
use App\Models\Orders;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{


    public function index()
    {


        $data = Address::where('userID','=',Auth::id())->get();
        $userData = User::where('id','=',Auth::id())->get();
        return view('front.account',['data'=>$data,'userData'=>$userData]);
    }

    public function addAddress()
    {
        return view('front.addaddress');
    }

    public function editUser(Request $request)
    {

        $all = $request->except('_token');
        $update = User::where('id','=',Auth::id())->update($all);
        if ($update)
        {
            return notificationHelper::sendNotification('success','update');
        }
        else
        {
            return notificationHelper::sendNotification('error');
        }
    }

    public function addAddressStore(addressesRequest $request)
    {
        $all = $request->except('_token');
        $all['userID'] = Auth::id();

        $insert = Address::create($all);

        if ($insert)
        {
            return notificationHelper::sendNotification('success','create');
        }
        else
        {
            return notificationHelper::sendNotification('error');
        }
    }


    public function editAddress($id)
    {
        $control = Address::where('id','=',$id)
            ->where('userID','=',Auth::id())
            ->count();

        if ($control>0)
        {
            $data = Address::where('id','=',$id)
                ->get();

                   return view('front.editaddress',['data'=>$data]);
        }
    }

    public function editAddressUpdate(addressesRequest $request)
    {
        $addressID = $request->route('id');
        $all = $request->except('_token');
        $all['userID'] = Auth::id();

        $control = Address::where('id','=',$addressID)
            ->where('userID','=',Auth::id())
            ->count();

        if ($control>0)
        {
            $update = Address::where('id','=',$addressID)
                ->update($all);

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
            return abort(404);
        }

    }

    public function deleteAddress($id)
    {
        $control = Address::where('id','=',$id)
            ->where('userID','=',Auth::id())
            ->count();

        if ($control>0)
        {
            $delete = Address::where('id','=',$id)
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
        else
        {
            return abort(404);
        }
    }

    public function orders()
    {
        $data = DB::table('orders')
            ->select('id','orderNumber','status','created_at','shippingTrackingNumber',DB::raw('count(productID) as items '),DB::raw('SUM(totalPrice) as total'))
            ->where('userID','=',Auth::id())
            ->groupBy('orderNumber')
            ->orderByDesc('id')
            ->get();

        return view('front.orders',['data'=>$data]);
    }

    public function orderDetails($orderNumber)
    {
        $control = Orders::where('orderNumber','=',$orderNumber)
            ->where('userID','=',Auth::id())
            ->count();

        if ($control>0)
        {
            $data = DB::table('orders')
                ->select('products.id','products.name','products.metaTitle','products.metaDescription','products.permalink',
                    'orders.productID','orders.numberOfProducts','orders.price','orders.totalPrice','orders.status', 'orders.shippingTrackingNumber',
                'product_images.path')
                ->join('products','products.id','=','orders.productId')
                ->join('product_images','product_Images.productID','=','orders.productID')
                ->groupBy('orders.productID')
                ->where('orders.orderNumber','=',$orderNumber)
                ->get();

            $orderSummary = Shipping::where('orderNumber','=',$orderNumber)->get();
            return view('front.orderdetail',['data'=>$data,'orderSummary'=>$orderSummary]);
        }
        else
        {
            return abort(404);
        }
    }

}
