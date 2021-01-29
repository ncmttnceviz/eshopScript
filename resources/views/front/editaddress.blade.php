@extends('layouts.front')
@section('content')

    @if(session('status'))
        <div class="{{@session(('status'))}}" >
            <p class="text-center">{{__(session('message'))}}</p>
        </div>
    @endif
    <section class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    @include('layouts.accountnavigation')
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="col-12">
                            <div class="form-main">
                                <div class="title">
                                    <h4>{{__('Create Address')}}</h4>
                                </div>
                                <form class="form" method="post" action="{{route('front.account.editAddress',['id'=>$data[0]->id])}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{__('ADDRESS TITLE')}}<span>*</span></label>
                                                @error('addressTitle') <br><span style="color: #bd081c">{{$message}}</span> @enderror
                                                <input name="addressTitle" type="text" placeholder="" value="{{$data[0]->addressTitle}}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{__('ADDRESS')}}<span>*</span></label>
                                                @error('addressDescription') <br><span style="color: #bd081c">{{$message}}</span> @enderror
                                                <textarea name="addressDescription" id="" cols="30" rows="10">{{$data[0]->addressDescription}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>{{__('PROVINCE')}}<span>*</span></label>
                                                @error('province') <br><span style="color: #bd081c">{{$message}}</span> @enderror
                                                <input name="province" type="text" placeholder="" value="{{$data[0]->province}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>{{__('DISTRICT')}}<span>*</span></label>
                                                @error('district') <br><span style="color: #bd081c">{{$message}}</span> @enderror
                                                <input name="district" type="text" placeholder="" value="{{$data[0]->district}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>{{__('COUNTRY')}}<span>*</span></label>
                                                @error('country') <br><span style="color: #bd081c">{{$message}}</span> @enderror
                                                <input name="country" type="text" placeholder="" value="{{$data[0]->country}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>{{__('ZIP CODE')}}<span>*</span></label>
                                                @error('zipCode') <br><span style="color: #bd081c">{{$message}}</span> @enderror
                                                <input name="zipCode" type="text" placeholder="" value="{{$data[0]->zipCode}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn ">{{__('EDIT ADDRESS')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

@endsection

