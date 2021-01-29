@extends('layouts.admin.app')
@section('content')
    <div class="col-lg-12">
        <div class="panel">
            @if(session('status'))
                <div class="{{session('status')}} " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> {{__(session('message'))}}
                </div>
            @endif
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Edit Order')}}</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>{{__('PRODUCT')}}</th>
                        <th class="text-center">{{__('UNIT PRICE')}}</th>
                        <th class="text-center">{{__('QUANTITY')}}</th>
                        <th class="text-center">{{__('TOTAL')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $kay => $value)
                        <tr>
                            <td class="">{{$value->name}}</td>
                            <td class="text-center">{{$value->price}}</td>
                            <td class="text-center">{{$value->numberOfProducts}}</td>
                            <td class="text-center">{{$value->totalPrice}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br><br>
                <label for=""><b>{{__('Order Summary')}}</b></label><br>
                <label for="">{{__('Cart Subtotal')}} : {{$orderSummary[0]->subTotal}}</label><br>
                <label for="">{{__('Shipping')}}: {{$orderSummary[0]->shippingPrice}}</label><br>
                <label for="">{{__('Amount Paid')}}: {{$orderSummary[0]->cartTotal}}</label><br>
                <br>
                <div class="col-12">
                    <label for="">{{__('Customer Information')}}</label><br>
                    <label for="">{{__('Name')}} : {{$userData[0]->name}}</label><br>
                    <label for="">{{__('Email')}} : {{$userData[0]->email}}</label><br>
                    <label for="">{{__('Province')}} : {{$userData[0]->province}}</label><br>
                    <label for="">{{__('District')}} : {{$userData[0]->district}}</label><br>
                    <label for="">{{__('Address')}} : {{$userData[0]->addressDescription}}</label><br>
                </div>



                @if($data[0]->status ==0)
                <form action="{{route('admin.orders.detail.post',['orderNumber'=>$data[0]->orderNumber])}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="">{{__('Shipping Tracking Number')}}</label><br>
                        <input type="text" class="form-control" name="shippingTrackingNumber">
                        <input type="hidden" class="form-control" name="email" value="{{$userData[0]->email}}">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="{{__('Create')}}">
                </form>
                @elseif($data[0]->status == 1)
                    <form action="{{route('admin.orders.complete.post',['orderNumber'=>$data[0]->orderNumber])}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <label for="">{{__('Shipping Tracking Number')}} : {{$data[0]->shippingTrackingNumber}}</label><br>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success" value="{{__('Complete The Order')}}">
                    </form>
                @elseif($data[0]->status==2)
                    <label for="">{{__('Shipping Tracking Number')}}  :  {{$data[0]->shippingTrackingNumber}}</label>
                @endif
            </div>

        </div>
    </div>

@endsection
