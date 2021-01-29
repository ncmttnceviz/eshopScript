@extends('layouts.admin.app')
@section('content')
        <div class="col-lg-12">
            @if(session('status'))
                <div class="{{session('status')}} " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> {{__(session('message'))}}
                </div>
            @endif
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$page}}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{__('Order Number')}}</th>
                            <th class="text-center">{{__('Product')}}</th>
                            <th class="text-center">{{__('Total')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $kay => $value)
                        <tr>
                            <td >{{$value->orderNumber}}</td>
                            <td class="text-center">{{$value->items}}</td>
                            <td class="text-center">{{$value->total}}</td>
                            <td class="text-center"><a href="{{route('admin.orders.detail',['orderNumber'=>$value->orderNumber])}}"><button type="button" class="btn btn-warning">{{__('Edit')}}</button></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
