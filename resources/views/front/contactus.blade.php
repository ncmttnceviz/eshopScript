@extends('layouts.front')
@section('content')
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>{{\App\Helper\funcHelper::decodeAppName(config('app.name'))}}</h4>
                                <h3>{{__('Write us a message')}}</h3>
                            </div>

                            @if(session('status'))
                                <div class="{{session('status')}} " role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="fa fa-times-circle"></i> {{__(session('message'))}}
                                </div>
                            @endif
                            <form class="form" method="post" action="{{route('front.contactus.post')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>{{__('Your Name')}}<span>*</span></label>
                                            @error('name') <br><span style="color: #bd081c">{{$message}}</span> @enderror
                                            <input name="name" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>{{__('Subject')}}<span>*</span></label>
                                            @error('subject') <br><span style="color: #bd081c">{{$message}}</span> @enderror
                                            <input name="subject" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>{{__('Your Email')}}<span>*</span></label>
                                            @error('email')<br> <span style="color: #bd081c">{{$message}}</span> @enderror
                                            <input name="email" type="email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>{{__('Your Phone')}}<span>*</span></label>
                                            @error('phonenumber')<br> <span style="color: #bd081c">{{$message}}</span> @enderror
                                            <input name="phonenumber" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group message">
                                            <label>{{__('Your message')}}<span>*</span></label>
                                            @error('message')<br> <span style="color: #bd081c">{{$message}}</span> @enderror
                                            <textarea name="message" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">{{__('Send Message')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="single-head">
                            <div class="single-info">
                                <i class="fa fa-phone"></i>
                                <h4 class="title">{{__('Call us Now')}}:</h4>
                                <ul>
                                    <li>{{\App\Models\SiteConfig::getConfig('phoneNumber')}}</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-envelope-open"></i>
                                <h4 class="title">{{__('Email')}}:</h4>
                                <ul>
                                    <li><a href="mailto:{{\App\Models\SiteConfig::getConfig('mailAddress')}}">{{\App\Models\SiteConfig::getConfig('mailAddress')}}</a></li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-location-arrow"></i>
                                <h4 class="title">{{__('Our Address')}}:</h4>
                                <ul>
                                    <li>{{\App\Models\SiteConfig::getConfig('address')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    <!-- Map Section -->
    <div class="map-section">
        <div id="myMap"></div>
    </div>
@endsection
