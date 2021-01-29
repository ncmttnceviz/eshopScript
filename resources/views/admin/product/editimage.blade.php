@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(session('status'))
                <div class="{{session('status')}} " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> {{__(session('message'))}}
                </div>
            @endif
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{__('Images')}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 20px">
                        <form action="{{route('admin.product.image.post',['id'=>$productID])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="file"  name="image[]" multiple style="display: inline;">
                            <input type="hidden" name="name" value="{{\App\Models\Product::getField($productID,'permalink')}}">
                            <input type="submit" class="btn btn-success" value="{{__('Create')}}">
                        </form>
                    </div>
                    <div class="row">
                        @foreach($data as $key => $value)
                           <div class="col-lg-2" style="margin-bottom: 25px">
                                <a href="">
                                     <img class="default-img" src="{{asset($value['path'])}}" alt="#" style="with:250px;height: 250px">
                               </a>
                               <div style="position: absolute;right: 14px;top: 0px;"><a href="{{route('admin.product.image.delete',['id'=>$value['id']])}}"> <button class="btn btn-danger">{{__('Delete')}}</button></a></div>

                           </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
