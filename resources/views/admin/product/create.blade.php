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
                <h3 class="panel-title">{{__('Create New Product')}}</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.product.create.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="">{{__('Product Category')}}</label>
                    <br>
                    @error('categoryID') <span style="color: #bd081c">Bu Alanı Doldurmak Zorunludur</span> @enderror
                    <div class="input-group">
                        <select class="form-control" name="categoryID" name="categoryID">

                            @foreach(\App\Models\Categories::where('type','=',0)->get() as $key => $value)
                                @php if (\App\Models\Categories::where('mainCategoryID','=',$value['id'])->count()>0){ @endphp
                                <optgroup label="{{$value['name']}}">
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @foreach(\App\Models\Categories::where('mainCategoryID','=',$value['id'])->get() as $subkey => $subvalue)
                                    <option value="{{$subvalue['id']}}">{{$subvalue['name']}}</option>
                                    @endforeach
                                </optgroup>
                            @php }else{ @endphp

                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @php } @endphp
                            @endforeach
                        </select>
                    </div>
                    <div class="ajax">

                    </div>
                    <br>
                    <label for="">{{__('Product Name')}}</label>
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
                    <label for="">{{__('Price')}}</label>
                    <br>
                    @error('price') <span style="color: #bd081c">Bu Alanı Doldurmak Zorunludur</span> @enderror
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="price" value="{{ old('price') }}">
                    </div>
                    <br>
                    <label for="">{{__('Stock')}}</label>
                    <br>
                    @error('stock') <span style="color: #bd081c">{{$message}}</span> @enderror
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="stock" value="{{ old('stock') }}">
                    </div>
                    <br>
                    <label for="">{{__('Product Images')}}</label>
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="file" name="image[]" multiple>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="{{__('create')}}">
                </form>
            </div>

        </div>
    </div>


@endsection
