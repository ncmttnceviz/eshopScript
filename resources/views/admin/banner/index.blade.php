@extends('layouts.admin.app')
@section('content')

    <div class="panel">
        @if(session('status'))
            <div class="{{session('status')}} " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-times-circle"></i> {{__(session('message'))}}
            </div>
        @endif
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Banners')}}</h3>
        </div>
        <div class="panel-body">

            <form action="{{route('admin.banners.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">{{__('Choose Banner')}}</label><br>
                <div class="input-group">
                    <select name="banner" id="" class="form-control" >
                        <option value="2">{{__('Choose')}}</option>
                        <option value="mainBanner" class="" >{{__('Main Banner')}}</option>
                        <option value="topBannerOne" class="" >{{__('Top Banner One')}}</option>
                        <option value="topBannerTwo" class="" >{{__('Top Banner Two')}}</option>
                        <option value="topBannerThree" class="" >{{__('Top Banner Three')}}</option>
                        <option value="midBannerOne" class="" >{{__('Mid Banner One')}}</option>
                        <option value="midBannerTwo" class="" >{{__('Mid Banner Two')}}</option>
                    </select>
                </div>
                <br>
                <label for="">{{__('Banner Title')}}</label><br>
                <div class="input-group">
                    <input type="text" class="form-control" name="Title">
                </div>
                <br>
                <label for="">{{__('Banner Text')}}</label><br>
                <div class="input-group">
                    <input type="text" class="form-control" name="Text">
                </div>
                <br>
                <label for="">{{__('Banner Route')}}</label><br>
                <div class="input-group">
                    <select name="Route" id="" class="form-control chooseroute" data-target="mainbanner">
                        <option value="2">{{__('Choose')}}</option>
                        <option value="0" class="" >{{__('Category')}}</option>
                        <option value="1" class="">{{__('Product')}}</option>
                    </select>
                </div>
                <br>

                <label for="">{{__('Choose Link')}}</label><br>
                <div class="input-group">
                    <select name="Link" id="" class="form-control">
                        <option value="2" selected>{{__('Choose')}}</option>
                        <optgroup class="mainbanner"  data="0" style="display: none">
                        @foreach($categories as $key => $value)
                          <option value="{{$value->permalink}}" class="">{{$value->name}}</option>
                        @endforeach
                        </optgroup>
                        <optgroup class="mainbanner"  data="1" style="display: none">
                                @foreach($products as $key => $value)
                                    <option value="{{$value->permalink}}" class="">{{$value->name}}</option>
                                @endforeach
                        </optgroup>

                    </select>
                </div>

                <br>
                <input type="file"  name="image"  style="display: inline;">
                <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
            </form>

        </div>
    </div>
@endsection
