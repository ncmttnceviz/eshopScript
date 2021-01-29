<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Helper\notificationHelper;
use App\Http\Controllers\Controller;
use App\Mail\mailController;
use App\Models\Orders;
use App\Models\Shipping;
use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class indexController extends Controller
{
    public function index($status)
    {
        $data = Orders::where('status','=',$status)
            ->select('orderNumber',DB::raw('count(productID) as items '),DB::raw('SUM(totalPrice) as total'))
            ->groupBY('orderNumber')
            ->get();
        if ($status == 0)
        {
            $page = __('Pending Orders');
        }
        else if ($status == 1)
        {
            $page = __('Orders in Cargo');
        }
        else if($status == 2)
        {
            $page = __('Completed Orders');
        }

        return view('admin.order.index',['data'=>$data,'page'=>$page]);
    }

    function orderDetail($orderNumber)
    {
        $data = DB::table('orders')
            ->select('products.id','products.name', 'orders.orderNumber', 'orders.shippingTrackingNumber',
                'orders.productID','orders.numberOfProducts','orders.price','orders.totalPrice','orders.status','orders.deliveryAddress')
            ->join('products','products.id','=','orders.productId')
            ->groupBy('orders.productID')
            ->where('orders.orderNumber','=',$orderNumber)
            ->get();

        $userData = DB::table('users')
            ->select('users.id','users.name','users.email','addresses.province','addresses.district','addresses.addressDescription')
            ->join('addresses','addresses.userID','=','users.id')
            ->where('addresses.id','=',$data[0]->deliveryAddress)
            ->get();


        $orderSummary = Shipping::where('orderNumber','=',$orderNumber)->get();

        return view('admin.order.edit',['data'=>$data,'orderSummary'=>$orderSummary,'userData'=>$userData]);
    }

    function trackingNumber(Request $request)
    {
        $orderNumber = $request->route('orderNumber');
        $email = $request->input('email');
        $shipingTrackingNumber = $request->input('shippingTrackingNumber');;

        $update = Orders::where('orderNumber','=',$orderNumber)
            ->update([
                "shippingTrackingNumber"=> $shipingTrackingNumber,
                "status" => 1
            ]);

        if ($update)
        {
            $messagedata = [
                'trackingNumber' => $shipingTrackingNumber
            ];
            Mail::send(new mailController($email,__('Cargo information'),'admin.trackingmail',$messagedata));
            return notificationHelper::sendNotification('success','create');
        }
    }

    function completeOrder(Request $request)
    {
        $orderNumber = $request->route('orderNumber');

        $update = Orders::where('orderNumber','=',$orderNumber)
            ->update([
                'status' => 2
            ]);

        if ($update)
        {
            return notificationHelper::sendNotification('success','create');
        }
    }
}
