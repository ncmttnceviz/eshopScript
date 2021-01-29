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
                <div class="col-lg-9 col-md-8 col-12">
                    @if(session('status'))
                        <div class="{{@session(('status'))}}" >
                            <p class="text-center">{{__(session('message'))}}</p>
                        </div>
                    @endif
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

                        @if($data->count() > 0)
                            <table class="table shopping-summery">
                                <thead>
                                <tr class="main-hading">
                                    <th class="text-center">{{__('ORDER NUMBER')}}</th>
                                    <th class="text-center">{{__('Product')}}</th>
                                    <th class="text-center">{{__('Total')}}</th>
                                    <th class="text-center">{{__('Date')}}</th>
                                    <th class="text-center">{{__('Status')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des">{{$value->orderNumber}}</p>
                                        </td>
                                        <td class="product-des text-center" data-title="Description">
                                            <p class="product-des">{{$value->items}}</p>
                                        </td>
                                        <td class="product-des text-center" data-title="Description">
                                            <p class="product-des">{{$value->total}}</p>
                                        </td>
                                        <td class="product-des text-center" data-title="Description">
                                            <p class="product-des">{{$value->created_at}}</p>
                                        </td>

                                        <td class="product-des text-center" data-title="Description">
                                            <a href="{{route('front.account.orders.detail',['orderNumber'=>$value->orderNumber])}}"><i class="ti-files"></i>
                                            <p class="product-des">
                                                @if($value->status == 0)
                                                    {{__('Order is Preparing')}}
                                                @elseif($value->status == 1)
                                                    {{__('In Cargo')}} : {{__('Shipping Tracking Number')}} {{$value->shippingTrackingNumber}}
                                                @elseif($value->status== 2)
                                                    {{__('Was Delivered')}}
                                                @endif

                                            </p>
                                            </a>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
