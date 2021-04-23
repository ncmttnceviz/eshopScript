<!DOCTYPE html>
<html lang="<?php echo e(\App\Models\SiteConfig::getConfig('language')); ?>">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title><?php echo e(config('app.name')); ?> - <?php echo e(\App\Helper\funcHelper::getMeta(\Illuminate\Support\Facades\Route::currentRouteName(),'metaTitle')); ?></title>
    <meta name="description" content="<?php echo e(\App\Helper\funcHelper::getMeta(\Illuminate\Support\Facades\Route::currentRouteName(),'metaDescription')); ?>">
    <meta name="keywords" content="<?php echo e(\App\Helper\funcHelper::getMeta(\Illuminate\Support\Facades\Route::currentRouteName(),'metaKeywords')); ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.css')); ?>">
    <!-- Fancybox -->
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.fancybox.min.css')); ?>">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('css/themify-icons.css')); ?>">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/niceselect.css')); ?>">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/flex-slider.min.css')); ?>">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo e(asset('css/owl-carousel.css')); ?>">
    <!-- Slicknav -->
    <link rel="stylesheet" href="<?php echo e(asset('css/slicknav.min.css')); ?>">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
    <style>
        .sld-button {
            width: 30px;
            height: 60px;
            background-color: #ffff;
            font-size: 15px;
        }

        .sld-button:hover {
            background-color: #f7941d;
            color: #FFFFFF;
        }
    </style>


</head>
<body class="js">


<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>




<header class="header shop">
  <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">

                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <?php $__currentLoopData = \App\Models\Categories::where('type','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $count = \App\Models\Categories::where('mainCategoryID','=',$value['id'])->count();
                                                if ($count>0)
                                                    { ?>
                                                <li><a href="#"><?php echo e($value['name']); ?><i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="<?php echo e(route('front.category',['permalink'=>$value['permalink']])); ?>"><?php echo e(__('All Products')); ?></a></li>
                                                       <?php $__currentLoopData = \App\Models\Categories::where('type','=',1)->where('mainCategoryID','=',$value['id'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkey => $subvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><a href="<?php echo e(route('front.category',['permalink'=>$subvalue['permalink']])); ?>"><?php echo e($subvalue['name']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php } else { ?>

                                            <li><a href="<?php echo e(route('front.category',['permalink'=>$value['permalink']])); ?>"><?php echo e($value['name']); ?></a></li>
                                                <?php } ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="<?php echo e(route('front.cart')); ?>"><?php echo e(__('Cart')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

<?php echo $__env->yieldContent('content'); ?>



<!-- Start Footer Area -->
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="<?php echo e(route('front.index')); ?>"><img src="<?php echo e(asset('images/logo2.png')); ?>" alt="#"></a>
                        </div>
                        <p class="text"><?php echo e(\App\Models\SiteConfig::getConfig('metaTitle')); ?></p>
                        <p class="call"><?php echo e(__('Got Question? Call us 24/7')); ?><span><a href="<?php echo e(\App\Models\SiteConfig::getConfig('phoneNumber')); ?>"><?php echo e(\App\Models\SiteConfig::getConfig('phoneNumber')); ?></a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4><?php echo e(__('Information')); ?></h4>
                        <ul>
                            <li><a href="<?php echo e(route('front.aboutus')); ?>"><?php echo e(__('About Us')); ?></a></li>
                            <li><a href="<?php echo e(route('front.faq')); ?>"><?php echo e(__('Faq')); ?></a></li>
                            <li><a href="<?php echo e(route('front.termsconditions')); ?>"><?php echo e(__('Terms & Conditions')); ?></a></li>
                            <li><a href="<?php echo e(route('front.privacypolicy')); ?>"><?php echo e(__('Privacy Policy')); ?></a></li>
                            <li><a href="<?php echo e(route('front.contactus')); ?>"><?php echo e(__('Contact Us')); ?></a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4><?php echo e(__('Get In Tuch')); ?></h4>
                        <!-- Single Widget -->
                        <div class="contact">
                            <?php echo e(\App\Models\SiteConfig::getConfig('adress')); ?>

                        </div>
                        <!-- End Single Widget -->
                        <ul>
                            <li><a href="<?php echo e(\App\Models\SiteConfig::getConfig('SocialFacebook')); ?>"><i class="ti-facebook"></i></a></li>
                            <li><a href="<?php echo e(\App\Models\SiteConfig::getConfig('SocialTwitter')); ?>"><i class="ti-twitter"></i></a></li>
                            <li><a href="<?php echo e(\App\Models\SiteConfig::getConfig('SocialPinterest')); ?>"><i class="ti-pinterest"></i></a></li>
                            <li><a href="<?php echo e(\App\Models\SiteConfig::getConfig('SocialInstagram')); ?>"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>Copyright © 2020 <a href="<?php echo e(route('front.index')); ?>"><?php echo e(\App\Helper\funcHelper::decodeAppName(config('app.name'))); ?></a>  -
                                <?php echo e(__('All Rights Reserved.')); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img src="<?php echo e(asset('images/payments.png')); ?>" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->

<!-- Jquery -->

<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-migrate-3.0.0.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<!-- Popper JS -->
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<!-- Bootstrap JS -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<!-- Color JS -->
<script src="<?php echo e(asset('js/colors.js')); ?>"></script>
<!-- Slicknav JS -->
<script src="<?php echo e(asset('js/slicknav.min.js')); ?>"></script>
<!-- Owl Carousel JS -->
<script src="<?php echo e(asset('js/owl-carousel.js')); ?>"></script>
<!-- Magnific Popup JS -->
<script src="<?php echo e(asset('js/magnific-popup.js')); ?>"></script>
<!-- Waypoints JS -->
<script src="<?php echo e(asset('js/waypoints.min.js')); ?>"></script>
<!-- Countdown JS -->
<script src="<?php echo e(asset('js/finalcountdown.min.js')); ?>"></script>
<!-- Nice Select JS -->
<script src="<?php echo e(asset('js/nicesellect.js')); ?>"></script>
<!-- Flex Slider JS -->
<script src="<?php echo e(asset('js/flex-slider.js')); ?>"></script>
<!-- ScrollUp JS -->
<script src="<?php echo e(asset('js/scrollup.js')); ?>"></script>
<!-- Onepage Nav JS -->
<script src="<?php echo e(asset('js/onepage-nav.min.js')); ?>"></script>
<!-- Easing JS -->
<script src="<?php echo e(asset('js/easing.js')); ?>"></script>
<!-- Active JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>
<script src="<?php echo e(asset('js/gmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/map-script.js')); ?>"></script>
<script src="<?php echo e(asset('js/active.js')); ?>"></script>
<script type="text/javascript">
    $().ready(function (){

        var total =0;

        images = $('.sld-img').each(function (index,element){
            total++
        })
        open();
        function open() {
            var open = $('#sldimg').attr('data');
            var images = $('.sld-img').each(function (index,element){
                if (open == index)
                {
                    var div = $(this).attr('data',index).css('display','block');
                }
                else
                    {
                    var div = $(this).attr('data',index).css('display','none');
                }

                })
            }



        $('.sld-button').click(function (){
           var image = $(this).attr('data');
            var now = parseInt($('#sldimg').attr('data'));
           if (image == 'left')
           {
               if (now-1 >= 0)
               {
                   $('#sldimg').attr('data',now-1);
                 open();
               }
           }else if(image == 'right')
           {
               if (now+1 < total)
               {
                 $('#sldimg').attr('data',now+1);
                 open();
               }
           }
        })

        $('.stock').click(function (){
            var type = $(this).attr('data');

            if (type=="plus")
            {
                console.log(type);
            }
            else if(type=="minus")
            {
                var control = parseInt($('#stock').val());

                if (control > 0)
                {
                    $('#stock').val(control-1);
                }
            }
            else
            {
                console.log('error');
            }
        })


        $('.minus').click(function (){
            var total = parseInt($('#total').val());
            if (total >1 )
            {
                $('#total').val(total-1);
            }
        });

        $('.plus').click(function (){
            var total = parseInt($('#total').val());
            var max = parseInt($('#total').attr('data-max'));
            if (total+1 <= max)
            {
                $('#total').val(total+1);
            }
        })

    })


</script>

<script type="text/javascript">



</script>
</body>
</html>
<?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/layouts/front.blade.php ENDPATH**/ ?>