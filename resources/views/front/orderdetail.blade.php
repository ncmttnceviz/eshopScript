@extends('layouts.front')
@section('content')


    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        @include('layouts.accountnavigation')
                    </div>
                </div>
                @if($data->count() > 0)
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top" style="padding: 18px 5px 12px 50px;!important;">
                                {{__('My Orders')}}
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <label for=""><b>{{__('Shipping Tracking Number')}} : {{$data[0]->shippingTrackingNumber}}</b></label> <br>
                            <table class="table shopping-summery">
                                <thead>
                                <tr class="main-hading">
                                    <th>{{__('PRODUCT')}}</th>
                                    <th></th>
                                    <th class="text-center">{{__('UNIT PRICE')}}</th>
                                    <th class="text-center">{{__('QUANTITY')}}</th>
                                    <th class="text-center">{{__('TOTAL')}}</th>
                                    <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td class="image" data-title="No" style="padding: 0px;!important; padding-left: 5px"><img src="{{asset($value->path)}}" alt="#" style="width: 100px;height: 136px"></td>
                                            <td class="product-des" data-title="Description">
                                                <p class="product-des"><a href="{{route('front.product',['permalink'=>$value->permalink])}}">{{$value->name}}</a></p>
                                            </td>
                                            <td class="price" data-title="Price"><span>{{$value->price}}</span></td>
                                            <td class="qty" data-title="Qty">
                                                {{$value->numberOfProducts}}
                                            </td>
                                            <td class="total-amount" data-title="Total"><span>{{$value->totalPrice}}</span></td>
                                            <td class="action" data-title="Remove"><a href="{{route('front.deleteItem',['id'=>$value->productID])}}"><i class="ti-trash remove-icon"></i></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


                    </div>
                    <div class="col-12">
                        <!-- Total Amount -->
                            <div class="total-amount">
                                <div class="row">
                                    <div class="col-lg-8 col-md-5 col-12">
                                        <div class="left">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-12">
                                        <div class="right">
                                            <span class=""><b>{{__('Order Summary')}}</b></span>
                                            <ul>
                                                @foreach($orderSummary as $key => $value)

                                                    <li><span style="display: inline-block;width: 100px">{{__('Cart Subtotal')}}</span><span class="text-right" style="display: inline-block;width: 100px">{{$value['subTotal']}}</span></li>
                                                    <li><span style="display: inline-block;width: 100px">{{__('Shipping')}}</span><span class="text-right" style="display: inline-block;width: 100px">{{$value['shippingPrice']}}</span></li>
                                                    <li><span style="display: inline-block;width: 100px">{{__('Amount Paid')}}</span><span class="text-right" style="display: inline-block;width: 100px">{{$value['cartTotal']}}</span></li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    <!--/ End Total Amount -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

@endsection
