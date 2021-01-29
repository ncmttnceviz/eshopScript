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
                <h3 class="panel-title">{{__('Create New Category')}}</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.category.create.post')}}" method="POST">
                    @csrf

                    <label for="">{{__('Category Type')}}</label>
                    <br>

                    <div class="input-group">
                        <select class="form-control" name="type" id="menutype">
                            <option value="0">{{__('Main Category')}}</option>
                            <option value="1">{{__('Sub Category')}}</option>
                        </select>
                    </div>
                    <div class="ajax">

                    </div>
                    <br>
                    <label for="">{{__('Category Name')}}</label>
                    <br>
                    @error('name') <span style="color: #bd081c">Bu Alanı Doldurmak Zorunludur</span> @enderror
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="name" value="{{ old('name') }}">
                    </div>
                    <br>
                    <label for="">{{__('Title')}}</label>
                    <br>
                    @error('metaTitle') <span style="color: #bd081c">Bu Alanı Doldurmak Zorunludur</span> @enderror
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="metaTitle" value="{{ old('metaTitle') }}">
                    </div>
                    <br>
                    <label for="">{{__('Description')}}</label>
                    <div class="input-group">
                        <textarea class="form-control" rows="4" name="metaDescription">{{ old('metaDescription') }}</textarea>
                    </div>
                    <label for="">{{__('Keywords')}}</label>
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="metaKeywords" value="{{ old('metaKeywords') }}">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="{{__('create')}}">
                </form>
            </div>

        </div>
    </div>


@endsection
