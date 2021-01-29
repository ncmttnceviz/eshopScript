@extends('layouts.admin.app')
@section('content')
    <div class="col-lg-12">
        <div class="panel">
            @if(session('status'))
                <div class="{{session('status')}} " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> {{__(session('message'))}}
                </div>
            @endif
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Edit Category')}}</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.category.edit.post',['id'=>$data[0]['id']])}}" method="POST">
                    @csrf

                    <label for="">{{__('Category Type')}}</label>
                    <br>
                    @error('name') <span style="color: #bd081c">Bu Alanı Doldurmak Zorunludur</span> @enderror
                    <div class="input-group">
                        <select class="form-control" name="type" id="menutype">
                            <option value="0" @if($data[0]['type']==0) selected @endif>{{__('Main Category')}}</option>
                            <option value="1" @if($data[0]['type']==1) selected @endif>{{__('Sub Category')}}</option>
                        </select>
                    </div>
                    <div class="ajax">

                        @if($data[0]['type']==1)
                            <label for="">{{__('Main Category')}}</label>
                            <div class="input-group">
                                <select class="form-control" name="mainCategoryID" >
                                    @foreach(\App\Models\Categories::all() as $key => $value)
                                    <option value="{{$value['id']}}" @if($data[0]['mainCategoryID']==$value['id']) selected @endif>{{$value['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <br>
                    <label for="">{{__('Category Name')}}</label>
                    <br>
                    @error('name') <span style="color: #bd081c">Bu Alanı Doldurmak Zorunludur</span> @enderror
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="name" value="{{ $data[0]['name'] }}">
                    </div>
                    <br>
                    <label for="">{{__('Title')}}</label>
                    <br>
                    @error('metaTitle') <span style="color: #bd081c">Bu Alanı Doldurmak Zorunludur</span> @enderror
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="metaTitle" value="{{ $data[0]['metaTitle'] }}">
                    </div>
                    <br>
                    <label for="">{{__('Description')}}</label>
                    <div class="input-group">
                        <textarea class="form-control" rows="4" name="metaDescription">{{ $data[0]['metaDescription'] }}</textarea>
                    </div>
                    <label for="">{{__('Keywords')}}</label>
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="metaKeywords" value="{{ $data[0]['metaKeywords'] }}">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="{{__('Edit')}}">
                </form>
            </div>

        </div>
    </div>

@endsection
