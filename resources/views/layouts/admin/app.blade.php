<!doctype html>
<html lang="tr">
<head>
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/chartist/css/chartist-custom.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="index.html"><img src="{{asset('images/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/img/user.png')}}" class="img-circle" alt=""> {{\Illuminate\Support\Facades\Auth::user()->name}} <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a style="color: #676a6d; margin-left: 20px" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lnr lnr-user"></i> <span>{{ __('Logout') }}</span></a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="{{route('admin.dashboard')}}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#products" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>{{__('Products')}}</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="products" class="collapse ">
                            <ul class="nav">
                                <li><a href="{{route('admin.product.index')}}" class="">{{__('Products')}}</a></li>
                                <li><a href="{{route('admin.product.create')}}" class="">{{__('Create New Product')}}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#categories" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>{{__('Categories')}}</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="categories" class="collapse ">
                            <ul class="nav">
                                <li><a href="{{route('admin.category.index')}}" class="">{{__('Categories')}}</a></li>
                                <li><a href="{{route('admin.category.create')}}" class="">{{__('Create New Category')}}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#orders" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>{{__('Orders')}}</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="orders" class="collapse ">
                            <ul class="nav">
                                <li><a href="{{route('admin.orders.index',['status'=>0])}}" class="">{{__('Pending Orders')}}</a></li>
                                <li><a href="{{route('admin.orders.index',['status'=>1])}}" class="">{{__('Orders in Cargo')}}</a></li>
                                <li><a href="{{route('admin.orders.index',['status'=>2])}}" class="">{{__('Completed Orders')}}</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#settings" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>{{__('Settings')}}</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="settings" class="collapse ">
                            <ul class="nav">
                                <li><a href="{{route('admin.config.index')}}" class="">{{__('General Settings')}}</a></li>
                                <li><a href="{{route('admin.config.info')}}" class="">{{__('Info Pages')}}</a></li>
                                <li><a href="{{route('admin.config.faq')}}" class="">{{__('Faq')}}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{route('admin.banners')}}" class=""><i class="lnr lnr-dice"></i> <span>{{__('Banners')}}</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->

    <div class="main">
        <div class="main-content">
        @yield('content')
        </div>
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{asset('/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('/assets/vendor/chartist/js/chartist.min.js')}}"></script>
<script src="{{asset('/assets/scripts/klorofil-common.js')}}"></script>
<script type="text/javascript">
$().ready(function (){
        $('#menutype').click(function (){

            selectCategoryType()

        })
    function selectCategoryType()
    {

        type = $('#menutype').val()

        if (type == "1")
        {
            $('.ajax').html("")
            $.ajax({
                url : "{{route('admin.category.getMainCategory')}}",
                method: "POST" ,
                headers: {'X-CSRF-TOKEN':'{{csrf_token()}}'},
                success:function (response){
                  $('.ajax').append("<br><label>{{__('Main Category')}}</label><select class='form-control' name='mainCategoryID' id='maincategoryID'>");
                    $.each(JSON.parse(response), function(i, item) {
                        $('#maincategoryID').append('<option value="'+item.id+'">'+item.name+'</option>')
                    });
                    $('.ajax').append("</select></div>");


                }
            })
        }
        else
        {
            $('.ajax').html('')
        }
    }

    $('#createButton').click(function (){

        var status = $('#create').attr('data')
        if (status=="close")
        {
            $('#create').css('display','block')
            $('#create').attr('data','open')
        }
        else
        {
            $('#create').css('display','none')
            $('#create').attr('data','close')
        }
    });

    $('.chooseroute').click(function (){

        var target = $('.chooseroute').attr('data-target')
        var value  = $('.chooseroute').val()

console.log(target)
        console.log(value)
       div = $('.' + target).each(function (index,item){
           if (index == value)
           {
               $(this).css('display','block')
           }
           else {
               $(this).css('display','none')
           }
       })
    });

})
</script>
</body>

</html>
