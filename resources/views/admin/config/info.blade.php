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
        <h3 class="panel-title">{{__('About Us')}}</h3>
    </div>
    <div class="panel-body">

        <form action="{{route('admin.config.info.update')}}" method="POST">

            <div class="input-group">
                <textarea name="aboutus" id="" cols="20" rows="20" class="form-control">{{$data[0]['aboutus']}}</textarea>
            </div>
            <br>
            <input type="hidden" value="aboutus" name="config">
            <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
            @csrf
        </form>
    </div>
</div>

<div class="panel">

    <div class="panel-heading">
        <h3 class="panel-title">{{__('Terms & Conditions')}}</h3>
    </div>
    <div class="panel-body">

        <form action="{{route('admin.config.info.update')}}" method="POST">

            <div class="input-group">
                <textarea name="termsConditions" id="" cols="20" rows="20" class="form-control">{{$data[0]['termsConditions']}}</textarea>
            </div>
            <br>
            <input type="hidden" value="termsConditions" name="config">
            <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
            @csrf
        </form>
    </div>
</div>

<div class="panel">

    <div class="panel-heading">
        <h3 class="panel-title">{{__('Privacy Policy')}}</h3>
    </div>
    <div class="panel-body">

        <form action="{{route('admin.config.info.update')}}" method="POST">

            <div class="input-group">
                <textarea name="privacyPolicy" id="" cols="20" rows="20" class="form-control">{{$data[0]['privacyPolicy']}}</textarea>
            </div>
            <br>
            <input type="hidden" value="privacyPolicy" name="config">
            <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
            @csrf
        </form>
    </div>
</div>
@endsection
