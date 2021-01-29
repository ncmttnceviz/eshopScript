@extends('layouts.admin.app')
@section('content')
    <div class="col-lg-12">
        <a href="{{route('admin.product.image',['id'=>$data[0]['id']])}}"><button type="button" class="btn btn-warning">{{__('Edit Images')}}</button></a>
        <br><br>
        <div class="panel">
            @if(session('status'))
                <div class="{{session('status')}} " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> {{__(session('message'))}}
                </div>
            @endif
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Edit Product')}}</h3>
                <div class="" style="float:right">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.product.edit.post',['id'=>$data[0]['id']])}}" method="POST">
                    @csrf

                    <label for="">{{__('Product Category')}}</label>
                    <br>
                    <div class="input-group">
                        <select class="form-control" name="categoryID">

                            @foreach(\App\Models\Categories::where('type','=',0)->get() as $key => $value)
                                @php if (\App\Models\Categories::where('mainCategoryID','=',$value['id'])->count()>0){ @endphp
                                <optgroup label="{{$value['name']}}">
                                    @foreach(\App\Models\Categories::where('mainCategoryID','=',$value['id'])->get() as $subkey => $subvalue)
                                        <option value="{{$subvalue['id']}}" @if($subvalue['id']==$data[0]['id']) selected @endif>{{$subvalue['name']}}</option>
                                    @endforeach
                                </optgroup>
                                @php }else{ @endphp

                                <option value="{{$value['id']}}" @if($subvalue['id']==$data[0]['id']) selected @endif>{{$value['name']}} </option>
                                @php } @endphp
                            @endforeach
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
                    <label for="">{{__('Price')}}</label>
                    <br>
                    @error('price') <span style="color: #bd081c">Bu Alanı Doldurmak Zorunludur</span> @enderror
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="price" value="{{ $data[0]['price'] }}">
                    </div>
                    <br>
                    <label for="">{{__('Stock')}}</label>
                    <br>
                    @error('stock') <span style="color: #bd081c">{{$message}}</span> @enderror
                    <div class="input-group">
                        <input class="form-control" placeholder="" type="text" name="stock" value="{{ $data[0]['stock'] }}">
                    </div>
                    <input type="submit" class="btn btn-success" value="{{__('Edit')}}">
                </form>
            </div>

        </div>
    </div>

@endsection
