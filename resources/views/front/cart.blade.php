@extends('layouts.front')
@section('content')

    @if(session('status'))
        <div class="{{@session(('status'))}}" >
            <p class="text-center">{{__(session('message'))}}</p>
        </div>
    @endif

    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
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

                        @if($data->count() >0)
                        @foreach($data as $key => $value)
                        <tr>
                            <td class="image" data-title="No" style="padding: 0px;!important; padding-left: 5px"><img src="{{asset($value->path)}}" alt="#" style="width: 100px;height: 136px"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="{{route('front.product',['permalink'=>$value->permalink])}}">{{$value->name}}</a></p>
                                <p class="product-des">{{$value->metaDescription}}</p>
                            </td>
                            <td class="price" data-title="Price"><span>{{$value->price}}</span></td>
                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                  {{$value->numberOfProducts}}
                            </td>
                            <td class="total-amount" data-title="Total"><span>{{\App\Helper\cartHelper::getTotalPrice($value->price,$value->numberOfProducts)}}</span></td>
                            <td class="action" data-title="Remove"><a href="{{route('front.deleteItem',['id'=>$value->productID])}}"><i class="ti-trash remove-icon"></i></a></td>
                        </tr>
                        @endforeach
                        @elseif($data->count() == 0)
                            <tr>
                                <td colspan="6"><p class="text-center">{{__('There is no product in your shopping cart')}}</p></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    @if($data->count() > 0)
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        @foreach($payment as $key => $value)

                                        <li>{{__('Cart Subtotal')}}<span>{{$value['subTotal']}}</span></li>
                                        <li>{{__('Shipping')}}<span>{{$value['shippingPrice']}}</span></li>
                                        <li class="last">{{__('You Pay')}}<span>{{$value['cartTotal']}}</span></li>
                                        @endforeach
                                    </ul>
                                    <div class="button5">
                                        <a href="{{route('front.clearCart')}}" class="btn">{{__('Clean the Cart')}}</a>
                                        <a href="{{url('/')}}" class="btn">{{__('Continue shopping')}}</a>
                                        <a href="{{route('front.completeShopping')}}" class="btn">{{__('Complete Shopping')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- End Shop Newsletter -->

@endsection
