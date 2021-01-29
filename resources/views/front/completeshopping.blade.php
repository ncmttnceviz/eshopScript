@extends('layouts.front')
@section('content')

    @if(\Illuminate\Support\Facades\Auth::check())

    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <form action="{{route('front.completeShopping.post')}}" method="POST" style="width: 100%">
                            @csrf
                            <table class="table shopping-summery">
                                <thead>
                                <tr class="main-hading">
                                    <th colspan="2" class="text-left">{{__('Choose Address')}}</th>
                                    <th></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td class="product-des" data-title="Description">
                                            <input type="radio" name="address" value="{{$value->id}}" checked>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des"><a href="#">{{$value->addressTitle}}</a></p>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des"><a href="#">{{$value->addressDescription}}</a></p>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des"><a href="#">{{$value->province}}</a></p>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des"><a href="#">{{$value->district}}</a></p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                <input type="submit" class="btn" value="{{__('Pay')}}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @else


            <div class="text-center" style="margin-top: 50px;height: 150px">

                {{__('In order to continue')}} <a href="{{route('login')}}" class=""><span style="color:#f7941d">{{__('Login')}}</span></a>  <a href="{{route('register')}}">
                {{__('or')}}    <span style="color:#f7941d">{{__('Register')}}</span>
                </a>

            </div>




    @endif

@endsection
