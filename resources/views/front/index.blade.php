@extends('layouts.front')
@section('content')

    <section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider" style="background-image: url('{{asset($banners[0]['mainBanner'])}}')">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-9 offset-lg-3 col-12">
                        <div class="text-inner">
                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="hero-text">
                                        <h1>{{$banners[0]['mainBannerTitle']}}</h1>
                                        <p>{{$banners[0]['mainBannerText']}}</p>
                                        <div class="button">
                                            @if($banners[0]['mainBannerRoute'] == 0)
                                                <a href="{{route('front.category',['permalink'=>$banners[0]['mainBannerLink']])}}" class="btn">{{__('Shop Now!')}}</a>
                                            @elseif($banners[0]['mainBannerRoute'] == 1)
                                                <a href="{{route('front.product',['permalink'=>$banners[0]['mainBannerLink']])}}" class="btn">{{__('Shop Now!')}}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>

    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset($banners[0]['topBannerOne'])}}" alt="#">
                        <div class="content">
                            <p>{{$banners[0]['topBannerOneTitle']}}</p>
                            <h3>{{$banners[0]['topBannerOneText']}}</h3>
                            @if($banners[0]['topBannerOneRoute'] == 0)
                                <a href="{{route('front.category',['permalink'=>$banners[0]['topBannerOneLink']])}}" >{{__('Shop Now!')}}</a>
                            @elseif($banners[0]['topBannerOneRoute'] == 1)
                                <a href="{{route('front.product',['permalink'=>$banners[0]['topBannerOneLink']])}}" >{{__('Shop Now!')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset($banners[0]['topBannerTwo'])}}" alt="#">
                        <div class="content">
                            <p>{{$banners[0]['topBannerTwoTitle']}}</p>
                            <h3>{{$banners[0]['topBannerTwoText']}}</h3>
                            @if($banners[0]['topBannerTwoRoute'] == 0)
                                <a href="{{route('front.category',['permalink'=>$banners[0]['topBannerTwoLink']])}}" >{{__('Shop Now!')}}</a>
                            @elseif($banners[0]['topBannerTwoRoute'] == 1)
                                <a href="{{route('front.product',['permalink'=>$banners[0]['topBannerTwoLink']])}}" >{{__('Shop Now!')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-12">
                    <div class="single-banner">
                        <img src="{{asset($banners[0]['topBannerThree'])}}" alt="#">
                        <div class="content">
                            <p>{{$banners[0]['topBannerThreeTitle']}}</p>
                            <h3>{{$banners[0]['topBannerThreeText']}}</h3>
                            @if($banners[0]['topBannerThreeRoute'] == 0)
                                <a href="{{route('front.category',['permalink'=>$banners[0]['topBannerThreeLink']])}}" >{{__('Shop Now!')}}</a>
                            @elseif($banners[0]['topBannerThreeRoute'] == 1)
                                <a href="{{route('front.product',['permalink'=>$banners[0]['topBannerThreeLink']])}}" >{{__('Shop Now!')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>{{__('Trending Item')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($trending as $key => $value)
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{route('front.product',['permalink'=>$value->permalink])}}">
                                <img class="default-img" src="{{asset($value->path)}}" alt="#">
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



    <br><br>

    <section class="midium-banner">
        <div class="container">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset($banners[0]['midBannerOne'])}}" alt="#">
                        <div class="content">
                            <p>{{$banners[0]['midBannerOneTitle']}}</p>
                            <h3>{{$banners[0]['midBannerOneText']}}</h3>
                            @if($banners[0]['midBannerOneRoute'] == 0)
                                <a href="{{route('front.category',['permalink'=>$banners[0]['topBannerThreeLink']])}}" >{{__('Shop Now!')}}</a>
                            @elseif($banners[0]['midBannerOneRoute'] == 1)
                                <a href="{{route('front.product',['permalink'=>$banners[0]['topBannerThreeLink']])}}" >{{__('Shop Now!')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset($banners[0]['midBannerTwo'])}}" alt="#">
                        <div class="content">
                            <p>{{$banners[0]['midBannerTwoTitle']}}</p>
                            <h3>{{$banners[0]['midBannerTwoText']}}</h3>
                            @if($banners[0]['midBannerTwoRoute'] == 0)
                                <a href="{{route('front.category',['permalink'=>$banners[0]['topBannerThreeLink']])}}" >{{__('Shop Now!')}}</a>
                            @elseif($banners[0]['midBannerTwoRoute'] == 1)
                                <a href="{{route('front.product',['permalink'=>$banners[0]['topBannerThreeLink']])}}" >{{__('Shop Now!')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>


    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{__('Hot Item')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->

                        @foreach($hot as $key => $value)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('front.product',['permalink'=>$value->permalink])}}">
                                    <img class="default-img" src="{{asset($value->path)}}" alt="#">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('front.product',['permalink'=>$value->permalink])}}">{{$value->name}}</a></h3>
                                <div class="product-price">
                                    <span>{{$value->price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>{{__('Popular Products')}}</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    @foreach($popularones as $key => $value)
                        <div class="single-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        <img src="{{asset($value->path)}}" alt="#">
                                        <a href="{{route('front.product',['permalink'=>$value->permalink])}}" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h5 class="title"><a href="{{route('front.product',['permalink'=>$value->permalink])}}">{{$value->name}}</a></h5>
                                        <p class="price with-discount">{{$value->price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>{{__('Best Seller')}}</h1>
                            </div>
                        </div>
                    </div>

                    @foreach($bestseller as $key => $value)
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="{{asset($value->path)}}" alt="#">
                                    <a href="{{route('front.product',['permalink'=>$value->permalink])}}" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">{{$value->name}}</a></h5>
                                    <p class="price with-discount">{{$value->price}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>{{__('Top Viewed')}}</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    @foreach($topviewed as $key => $value)
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="{{asset($value->path)}}" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">{{$value->name}}</a></h5>
                                    <p class="price with-discount">{{$value->price}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
