<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main">
                        <li><i class="ti-headphone-alt"></i> {{\App\Models\SiteConfig::getConfig('phoneNumber')}}</li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content">
                    <ul class="list-main">
                        @auth()
                        <li><i class="ti-user"></i> <a href="{{route('front.account')}}">{{__('My Account')}}</a></li>
                            <li>  <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="ti-power-off" ></i>{{ __('Logout') }}</a>
                            </form>
                            </li>
                        @endauth
                        @guest()
                        <li><i class="ti-power-off"></i><a href="{{route('login')}}">{{__('Login')}}</a></li>
                                <li><i class="ti-power-off"></i><a href="{{route('register')}}">{{__('Register')}}</a></li>

                            @endguest
                    </ul>
                </div>
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
<!-- End Topbar -->
<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{route('front.index')}}"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
                </div>
                <!--/ End Logo -->
                <!-- Search Form -->
                <!--/ End Search Form -->
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
                <div class="search-bar-top">

                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar">
                    <!-- Search Form -->
                    <div class="sinlge-bar">

                    </div>
                    <div class="sinlge-bar shopping">
                        <a href="{{route('front.cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{}}  {{\App\Helper\cartHelper::countCart()}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
