@extends('layouts.front')
@section('content')
    <section class="blog-single section">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="blog-single-main">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-detail">
                            <h2 class="blog-title">{{__('Faq')}}</h2>
                            <div class="content">
                                @foreach($data as $key => $value)
                                <p><h6>{{$data[0]['question']}}</h6></p>
                                <blockquote> <i class="fa fa-quote-left"></i> {{$data[0]['reply']}}</blockquote>
                                @endforeach
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
