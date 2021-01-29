@extends('layouts.front')
@section('content')

    @if(session('status'))
        <div class="{{@session(('status'))}}" >
       <p class="text-center">{{__(session('message'))}}</p>
        </div>
    @endif

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="form-main" style="padding: 0px" ">
                                    <div class="image" style="display: inline" id="sldimg" data="0">
                                        <div class="prew"  style="position: absolute;left: 13px;top: 180px;width: 40px"><button class="sld-button" data="left"><i class=" ti-arrow-left"></i></button></div>
                                        <div class="right" style="position: absolute;right: 2px;top: 180px;width: 40px"><button class="sld-button" data="right"><i class=" ti-arrow-right"></i></button></div>
                                        @foreach($data as $key => $value)
                                        <img src="{{asset($value->path)}}"  alt="A generic square placeholder image with rounded corners in a figure." class="sld-img" data="">
                                       @endforeach
                                    </div>
                                    <div class="clearfix"></div>

                    </div>
                    </div>

                    <div class="col-lg-8 col-12">
                        <div class="quickview-content">
                            <h2>{{$data[0]->name}}</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                </div>
                                <div class="quickview-stock">

                                </div>
                            </div>
                            <h3>{{$data[0]->price}}</h3>
                            <div class="quickview-peragraph">
                                <p>{{$data[0]->metaDescription}}</p>
                            </div>
                            <div class="quantity">
                                <form action="{{route('front.addcart')}}" method="POST">
                                @csrf
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="total" id="total" class="input-number" data-min="1" data-max="{{$data[0]->stock}}" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--/ End Input Order -->
                            </div>
                            <br><br>
                            <div class="add-to-cart">

                                    <input type="hidden" name="product" value="{{$data[0]->id}}">
                                    <button type="submit" class="btn">{{__('Add to cart')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
