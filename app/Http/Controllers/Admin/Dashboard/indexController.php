<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Shipping;
use Illuminate\Http\Request;

class indexController extends Controller
{


    public function index()
    {
        $pendingOrders = Orders::where('status','=',0)->count();
        $ordersInCargo = Orders::where('status','=',1)->count();
        $totalEarnings = Shipping::sum('cartTotal');

        return view('admin.dashboard',['pendingOrders'=>$pendingOrders,'ordersInCargo'=>$ordersInCargo,'totalEarnings'=>$totalEarnings]);
    }
}
