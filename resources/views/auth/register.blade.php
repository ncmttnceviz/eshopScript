@extends('layouts.front')
@section('content')
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>{{\App\Helper\funcHelper::decodeAppName(config('app.name'))}}</h4>
                                <h3>{{__('Join Us')}}</h3>
                            </div>
                            <x-auth-validation-errors style="color:#cc3318" class="mb-4" :errors="$errors" />
                            <form class="form" method="post" action="{{ route('register') }}">

                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="name" :value="__('Name')">{{__('Name')}}<span>*</span></label>
                                            <input id="name" type="text" placeholder="" name="name" :value="old('name')" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="surname" :value="__('surname')">{{__('Surname')}}<span>*</span></label>
                                            <input id="surname" type="text" placeholder="" name="surname" :value="old('surname')" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="email" :value="__('Email')">{{__('E-Mail Address')}}<span>*</span></label>
                                            <input id="email" type="email" name="email" :value="old('email')" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="password" :value="__('Password')">{{__('Password')}}<span>*</span></label>
                                            <input id="password"  placeholder=""  type="password"  name="password"  required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="password_confirmation" :value="__('Confirm Password')">{{__('Confirm Password')}}<span>*</span></label>
                                            <input  type="password"  name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">  {{ __('Register') }}</button>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
