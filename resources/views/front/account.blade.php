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
                        <form action="{{route('front.account.edit')}}" method="POST" style="width: 100%">
                            @csrf
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Name')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="name" value="{{$userData[0]->name}}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Surname')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="surname"value="{{$userData[0]->surname}}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Phone Number')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="telephoneNumber" value="{{$userData[0]->telephoneNumber}}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Identity Number')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="identityNumber" value="{{$userData[0]->identityNumber}}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn" value="{{__('Edit')}}" style="float: right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top" style="padding: 18px 5px 12px 50px;!important;">
                                {{__('My Addresses')}}
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
                                    <th>{{__('ADDRESS TITLE')}}</th>
                                    <th></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                <tr>
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
                                    <td class="action" data-title="Remove"><a href="{{route('front.account.editAddress',['id'=>$value->id])}}"><i class="ti-write remove-icon"></i></a></td>
                                    <td class="action" data-title="Remove"><a href="{{route('front.account.deleteAddress',['id'=>$value->id])}}"><i class="ti-trash remove-icon"></i></a></td>
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
