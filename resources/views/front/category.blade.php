@extends('layouts.front')
@section('content')
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">{{__('Categories')}}</h3>
                            <ul class="categor-list">
                                @if($data[0]['type']==1)
                                    @foreach(\App\Models\Categories::where('mainCategoryID','=',$data[0]['mainCategoryID'])->get() as $key => $value)
                                        <li><a href="{{route('front.category',['permalink'=>$value['permalink']])}}">{{$value['name']}}</a></li>
                                    @endforeach
                                @elseif($data[0]['type']==0)
                                    @foreach(\App\Models\Categories::where('type','=',0)->get() as $key => $value)
                                        <li><a href="{{route('front.category',['permalink'=>$value['permalink']])}}">{{$value['name']}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        @foreach($products as $key => $value)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('front.product',['permalink'=>$value->permalink])}}">
                                            <img class="default-img" src="{{asset(\App\Models\ProductImage::singleImage($value->id))}}" alt="#">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('front.product',['permalink'=>$value->permalink])}}">{{$value->name}}</a></h3>
                                        <div class="product-price">
                                            <span>{{$value->price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
