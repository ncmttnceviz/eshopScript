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
            <h3 class="panel-title">{{__('Choose Logo')}}</h3>
        </div>
        <div class="panel-body">

            <form action="{{route('admin.config.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file"  name="logo"  style="display: inline;">
                <input type="hidden" value="logo" name="config">
                <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
            </form>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Shipping Settings')}}</h3>
        </div>
        <div class="panel-body">

            <form action="{{route('admin.config.update')}}" method="POST">
                <label for="">{{__('Shipping Price')}}</label>
                <div class="input-group">
                    <input type="text" class="form-control"  name="shippingPrice" value="{{$data[0]['shippingPrice']}}">
                </div>
                <br>
                <label for="">{{__('Free Shipping Threshold')}}</label>
                <div class="input-group">
                    <input type="text"  class="form-control" name="freeShippingThreshold" value="{{$data[0]['freeShippingThreshold']}}">
                </div>
                <br>
                <input type="hidden" value="shipping" name="config">
                <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
                @csrf
            </form>
        </div>
    </div>

    <div class="panel">

        <div class="panel-heading">
            <h3 class="panel-title">{{__('Config')}}</h3>
        </div>
        <div class="panel-body">

            <form action="{{route('admin.config.update')}}" method="POST">

            <label for="">{{__('Site Name')}}</label>
            <div class="input-group">
                <input class="form-control" type="text" name="siteName" value="{{$data[0]['siteName']}}">
            </div>
            <br>

            <label for="">{{__('Site Title')}}</label>
            <div class="input-group">
                <input class="form-control" type="text" name="metaTitle" value="{{$data[0]['metaTitle']}}">
            </div>
            <br>

            <label for="">{{__('Site Description')}}</label>
            <div class="input-group">
                <input class="form-control" type="text" name="metaDescription" value="{{$data[0]['metaDescription']}}">
            </div>
            <br>

            <label for="">{{__('Keywords')}}</label>
            <div class="input-group">
                <input class="form-control" type="text" name="metaKeywords" value="{{$data[0]['metaKeywords']}}">
            </div>
            <br>

            <label for="">{{__('Address')}}</label>
            <div class="input-group">
                <textarea name="address" id="" class="form-control" cols="30" rows="5">{{$data[0]['address']}}</textarea>
            </div>
            <br>

            <label for="">{{__('Phone Number')}}</label>
            <div class="input-group">
                <input class="form-control" type="text" name="phoneNumber" value="{{$data[0]['phoneNumber']}}">
            </div>
            <br>
                <input type="hidden" value="general" name="config">
            <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
                @csrf
            </form>
        </div>
    </div>


    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Social Media Links')}}</h3>
        </div>
        <div class="panel-body">

            <form action="{{route('admin.config.update')}}" method="POST">

                <label for="">{{__('Facebook')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="SocialFacebook" value="{{$data[0]['SocialFacebook']}}">
                </div>
                <br>

                <label for="">{{__('Twitter')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="SocialTwitter" value="{{$data[0]['SocialTwitter']}}">
                </div>
                <br>

                <label for="">{{__('Instagram')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="SocialInstagram" value="{{$data[0]['SocialInstagram']}}">
                </div>
                <br>

                <label for="">{{__('Pinterest')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="SocialPinterest" value="{{$data[0]['SocialPinterest']}}">
                </div>
                <br>
                <input type="hidden" value="social" name="config">
                <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
                @csrf
            </form>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Iyzico Api Settings')}}</h3>
        </div>
        <div class="panel-body">

            <form action="{{route('admin.config.update')}}" method="POST">

                <label for="">{{__('paymentApi')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="paymentApi" value="{{$data[0]['paymentApi']}}">
                </div>
                <br>

                <label for="">{{__('paymentSecretKey')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="paymentSecretKey" value="{{$data[0]['paymentSecretKey']}}">
                </div>
                <br>

                <label for="">{{__('paymentBaseUrl')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="paymentBaseUrl" value="{{$data[0]['paymentBaseUrl']}}">
                </div>
                <br>
                <input type="hidden" value="payment" name="config">
                <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
                @csrf
            </form>
        </div>
    </div>


    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Mail Settings')}}</h3>
        </div>
        <div class="panel-body">

            <form action="{{route('admin.config.update')}}" method="POST">

                <label for="">{{__('Mail Address')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailAddress" value="{{$data[0]['mailAddress']}}">
                </div>
                <br>

                <label for="">{{__('Mail Host')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailHost" value="{{$data[0]['mailHost']}}">
                </div>
                <br>

                <label for="">{{__('Smtp Port')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailSmtpPort" value="{{$data[0]['mailSmtpPort']}}">
                </div>
                <br>

                <label for="">{{__('SSL / TLS')}}</label>
                <div class="input-group">
                    <select name="mailEncryption" id="" class="form-control">
                        <option value="ssl" @if($data[0]['mailEncryption'] == "ssl") selected @endif>SSL</option>
                        <option value="tls" @if($data[0]['mailEncryption'] == "tls") selected @endif>TLS</option>
                    </select>
                </div>
                <br>

                <label for="">{{__('Username')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailUser" value="{{$data[0]['mailUser']}}">
                </div>
                <br>

                <label for="">{{__('Password')}}</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailPassword" value="{{$data[0]['mailPassword']}}">
                </div>
                <br>
                <input type="hidden" value="mail" name="config">
                <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
                @csrf
            </form>
        </div>
    </div>

    <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Change Language')}}</h3>
    </div>
    <div class="panel-body">

        <form action="{{route('admin.config.update')}}" method="POST">
            @csrf
            <div class="input-group">
                <select name="language" id="" class="form-control">
                    <option value="tr" @if($data[0]['language'] == "tr") selected @endif>TR</option>
                    <option value="en" @if($data[0]['language'] == "en") selected @endif>EN</option>
                </select>
            </div>
            <br>
            <input type="hidden" value="language" name="config">
            <input type="submit" class="btn btn-warning" value="{{__('Edit')}}">
        </form>
    </div>
    </div>
@endsection
