@extends('layouts.admin.app')
@section('content')
            @if(session('status'))
                <div class="{{session('status')}} " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> {{__(session('message'))}}
                </div>
            @endif
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{__('Products')}}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{__('Product Name')}}</th>
                            <th>{{__('Stock')}}</th>
                            <th>{{__('Add/Remove')}} / {{__('Trends')}}</th>
                            <th>{{__('Add/Remove')}} / {{__('Hot Item')}}</th>
                            <th>{{__('Edit')}}</th>
                            <th>{{__('Remove')}} / {{__('Publish')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $kay => $value)
                        <tr>
                            <td>{{$value['name']}}</td>
                            <td>{{$value['stock']}}</td>
                            <td>
                                @if($value['status'] == 0 and $value['publish']==1)
                                    <a href="{{route('admin.product.trendHotStatus',['id'=>$value['id'],'status'=>1])}}"><button type="button" class="btn btn-success"><i class="fa fa-trash-o"></i> {{__('Add')}}</button></a>
                                @elseif($value['status'] == 1 and $value['publish']==1)
                                    <a href="{{route('admin.product.trendHotStatus',['id'=>$value['id'],'status'=>0])}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> {{__('Remove')}}</button></a>
                                @endif
                            </td>
                            <td>
                                @if($value['status'] == 0 and $value['publish']==1)
                                    <a href="{{route('admin.product.trendHotStatus',['id'=>$value['id'],'status'=>2])}}"><button type="button" class="btn btn-success"><i class="fa fa-trash-o"></i> {{__('Add')}}</button></a>
                                @elseif($value['status'] == 2 and $value['publish']==1)
                                    <a href="{{route('admin.product.trendHotStatus',['id'=>$value['id'],'status'=>0])}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> {{__('Remove')}}</button></a>
                                @endif
                            </td>
                            <td><a href="{{route('admin.product.edit',['id'=>$value['id']])}}"><button type="button" class="btn btn-warning">{{__('Edit')}}</button></a></td>
                            <td>
                                @if($value['publish'] == 1)
                                <a href="{{route('admin.product.publish',['id'=>$value['id'],'status'=>0])}}"><button type="button" class="btn btn-success"><i class="fa fa-trash-o"></i> {{__('Remove')}}</button></a>
                                @elseif($value['publish'] == 0)
                                    <a href="{{route('admin.product.publish',['id'=>$value['id'],'status'=>1])}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> {{__('Publish')}}</button></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
