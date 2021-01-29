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
                            <h2 class="blog-title">{{__('About Us')}}</h2>
                            <div class="content">
                                <p>@php echo $data @endphp</p>
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
