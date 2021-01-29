@extends('layouts.admin.app')
@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Stats')}}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-download"></i></span>
                        <p>
                            <span class="number">{{$pendingOrders}}</span>
                            <a href="{{route('admin.orders.index',['status'=>0])}}" class="">  <span class="title">{{__('Pending Orders')}}</span></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                        <p>
                            <span class="number">{{$ordersInCargo}}</span>
                            <a href="{{route('admin.orders.index',['status'=>1])}}" class="">  <span class="title">{{__('Orders In Cargo')}}</span></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-eye"></i></span>
                        <p>
                            <span class="number">{{$totalEarnings}}</span>
                            <span class="title">{{__('Total Earnings')}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
