
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
                                <h3>{{__('Enter Your Account Information')}}</h3>
                            </div>
                            <x-auth-validation-errors style="color:#cc3318" class="mb-4" :errors="$errors" />
                            <form class="form" method="post" action="{{ route('login') }}">

                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="email" :value="__('Email')">Mail Adresi<span>*</span></label>
                                            <input id="email" type="email" name="email" :value="old('email')" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="password" :value="__('Password')">Şifre<span>*</span></label>
                                            <input id="password"  placeholder=""  type="password"  name="password"  required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif

                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">  {{ __('Login') }}</button>
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
