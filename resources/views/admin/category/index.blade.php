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
                    <h3 class="panel-title">{{__('categories')}}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{__('Category Name')}}</th>
                            <th>{{__('Hit')}}</th>
                            <th>{{__('Edit')}}</th>
                            <th>{{__('Delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $kay => $value)
                        <tr>
                            @if($value['type']==1)
                                @php
                                   $maincategory = \App\Models\Categories::select('name')->where('id','=',$value['mainCategoryID'])->get();
                                   $name = $maincategory[0]['name'];
                                @endphp
                                <td>{{$name}} - {{$value['name']}}</td>
                            @else
                            <td>{{$value['name']}}</td>
                            @endif
                            <td>{{$value['hit']}}</td>
                            <td><a href="{{route('admin.category.edit',['id'=>$value['id']])}}"><button type="button" class="btn btn-warning">{{__('Edit')}}</button></a></td>
                            <td><a href="{{route('admin.category.delete',['id'=>$value['id']])}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> {{__('Delete')}}</button></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
