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
            <h3 class="panel-title">{{__('Faq')}}</h3>
        </div>
    </div>
            <button type="button" class="btn btn-success" id="createButton" style="margin-bottom: 10px">{{__('Create New Data')}}</button>
    <br>
            @error('question') <span style="color: #bd081c">Boş Alan Bırakmayın</span> @enderror
            @error('reply') <span style="color: #bd081c">Boş Alan Bırakmayın</span> @enderror
            <div id="create" style="display: none" data="close">
                <div class="panel">

                    <div class="panel-body">

                        <form action="{{route('admin.config.faq.create')}}" method="POST">
                            <label for="">{{__('Question')}}</label>

                            <div class="input-group">
                                <input type="text" class="form-control" name="question" value="">
                            </div>
                            <br>
                            <label for="">{{__('Reply')}}</label>

                            <div class="input-group">
                                <textarea name="reply" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success" value="{{__('Create')}}">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>


    @foreach($data as $key => $value)


        <div class="panel">

            <div class="panel-body">

                <form action="{{route('admin.config.faq.update')}}" method="POST">
                    <label for="">{{__('Question')}}</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="question" value="{{$value['question']}}">
                    </div>
                    <br>
                    <label for="">{{__('Reply')}}</label>
                    <div class="input-group">
                        <textarea name="reply" id="" cols="30" rows="10" class="form-control">{{$value['reply']}}</textarea>
                    </div>
                    <br>
                    <input type="hidden" value="{{$value['id']}}" name="id">
                    <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
                    <a href="{{route('admin.config.faq.delete',['id'=>$value['id']])}}"><button type="button" class="btn btn-danger">{{__('Delete')}}</button></a>
                    @csrf
                </form>

            </div>
        </div>
    @endforeach
@endsection
