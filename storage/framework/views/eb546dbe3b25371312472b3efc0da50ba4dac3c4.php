<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main">
                        <li><i class="ti-headphone-alt"></i> <?php echo e(\App\Models\SiteConfig::getConfig('phoneNumber')); ?></li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content">
                    <ul class="list-main">
                        <?php if(auth()->guard()->check()): ?>
                        <li><i class="ti-user"></i> <a href="<?php echo e(route('front.account')); ?>"><?php echo e(__('My Account')); ?></a></li>
                            <li>  <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                                <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="ti-power-off" ></i><?php echo e(__('Logout')); ?></a>
                            </form>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                        <li><i class="ti-power-off"></i><a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                                <li><i class="ti-power-off"></i><a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>

                            <?php endif; ?>
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
                    <a href="<?php echo e(route('front.index')); ?>"><img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo"></a>
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
                        <a href="<?php echo e(route('front.cart')); ?>" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo e(\App\Helper\cartHelper::countCart()); ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/layouts/header.blade.php ENDPATH**/ ?>