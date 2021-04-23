
<?php $__env->startSection('content'); ?>

    <section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider" style="background-image: url('<?php echo e(asset($banners[0]['mainBanner'])); ?>')">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-9 offset-lg-3 col-12">
                        <div class="text-inner">
                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="hero-text">
                                        <h1><?php echo e($banners[0]['mainBannerTitle']); ?></h1>
                                        <p><?php echo e($banners[0]['mainBannerText']); ?></p>
                                        <div class="button">
                                            <?php if($banners[0]['mainBannerRoute'] == 0): ?>
                                                <a href="<?php echo e(route('front.category',['permalink'=>$banners[0]['mainBannerLink']])); ?>" class="btn"><?php echo e(__('Shop Now!')); ?></a>
                                            <?php elseif($banners[0]['mainBannerRoute'] == 1): ?>
                                                <a href="<?php echo e(route('front.product',['permalink'=>$banners[0]['mainBannerLink']])); ?>" class="btn"><?php echo e(__('Shop Now!')); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>

    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="<?php echo e(asset($banners[0]['topBannerOne'])); ?>" alt="#">
                        <div class="content">
                            <p><?php echo e($banners[0]['topBannerOneTitle']); ?></p>
                            <h3><?php echo e($banners[0]['topBannerOneText']); ?></h3>
                            <?php if($banners[0]['topBannerOneRoute'] == 0): ?>
                                <a href="<?php echo e(route('front.category',['permalink'=>$banners[0]['topBannerOneLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php elseif($banners[0]['topBannerOneRoute'] == 1): ?>
                                <a href="<?php echo e(route('front.product',['permalink'=>$banners[0]['topBannerOneLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="<?php echo e(asset($banners[0]['topBannerTwo'])); ?>" alt="#">
                        <div class="content">
                            <p><?php echo e($banners[0]['topBannerTwoTitle']); ?></p>
                            <h3><?php echo e($banners[0]['topBannerTwoText']); ?></h3>
                            <?php if($banners[0]['topBannerTwoRoute'] == 0): ?>
                                <a href="<?php echo e(route('front.category',['permalink'=>$banners[0]['topBannerTwoLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php elseif($banners[0]['topBannerTwoRoute'] == 1): ?>
                                <a href="<?php echo e(route('front.product',['permalink'=>$banners[0]['topBannerTwoLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-12">
                    <div class="single-banner">
                        <img src="<?php echo e(asset($banners[0]['topBannerThree'])); ?>" alt="#">
                        <div class="content">
                            <p><?php echo e($banners[0]['topBannerThreeTitle']); ?></p>
                            <h3><?php echo e($banners[0]['topBannerThreeText']); ?></h3>
                            <?php if($banners[0]['topBannerThreeRoute'] == 0): ?>
                                <a href="<?php echo e(route('front.category',['permalink'=>$banners[0]['topBannerThreeLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php elseif($banners[0]['topBannerThreeRoute'] == 1): ?>
                                <a href="<?php echo e(route('front.product',['permalink'=>$banners[0]['topBannerThreeLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2><?php echo e(__('Trending Item')); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $trending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="<?php echo e(route('front.product',['permalink'=>$value->permalink])); ?>">
                                <img class="default-img" src="<?php echo e(asset($value->path)); ?>" alt="#">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3><a href="<?php echo e(route('front.product',['permalink'=>$value->permalink])); ?>"><?php echo e($value->name); ?></a></h3>
                            <div class="product-price">
                                <span><?php echo e($value->price); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>



    <br><br>

    <section class="midium-banner">
        <div class="container">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="<?php echo e(asset($banners[0]['midBannerOne'])); ?>" alt="#">
                        <div class="content">
                            <p><?php echo e($banners[0]['midBannerOneTitle']); ?></p>
                            <h3><?php echo e($banners[0]['midBannerOneText']); ?></h3>
                            <?php if($banners[0]['midBannerOneRoute'] == 0): ?>
                                <a href="<?php echo e(route('front.category',['permalink'=>$banners[0]['topBannerThreeLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php elseif($banners[0]['midBannerOneRoute'] == 1): ?>
                                <a href="<?php echo e(route('front.product',['permalink'=>$banners[0]['topBannerThreeLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="<?php echo e(asset($banners[0]['midBannerTwo'])); ?>" alt="#">
                        <div class="content">
                            <p><?php echo e($banners[0]['midBannerTwoTitle']); ?></p>
                            <h3><?php echo e($banners[0]['midBannerTwoText']); ?></h3>
                            <?php if($banners[0]['midBannerTwoRoute'] == 0): ?>
                                <a href="<?php echo e(route('front.category',['permalink'=>$banners[0]['topBannerThreeLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php elseif($banners[0]['midBannerTwoRoute'] == 1): ?>
                                <a href="<?php echo e(route('front.product',['permalink'=>$banners[0]['topBannerThreeLink']])); ?>" ><?php echo e(__('Shop Now!')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>


    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2><?php echo e(__('Hot Item')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->

                        <?php $__currentLoopData = $hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-product">
                            <div class="product-img">
                                <a href="<?php echo e($value->permalink); ?>">
                                    <img class="default-img" src="<?php echo e(asset($value->path)); ?>" alt="#">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3><a href="<?php echo e($value->permalink); ?>"><?php echo e($value->permalink); ?></a></h3>
                                <div class="product-price">
                                    <span><?php echo e($value->price); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1><?php echo e(__('Popular Products')); ?></h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    <?php $__currentLoopData = $popularones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        <img src="<?php echo e(asset($value->path)); ?>" alt="#">
                                        <a href="<?php echo e(route('front.product',['permalink'=>$value->permalink])); ?>" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h5 class="title"><a href="<?php echo e(route('front.product',['permalink'=>$value->permalink])); ?>"><?php echo e($value->name); ?></a></h5>
                                        <p class="price with-discount"><?php echo e($value->price); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1><?php echo e(__('Best Seller')); ?></h1>
                            </div>
                        </div>
                    </div>

                    <?php $__currentLoopData = $bestseller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="<?php echo e(asset($value->path)); ?>" alt="#">
                                    <a href="<?php echo e(route('front.product',['permalink'=>$value->permalink])); ?>" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#"><?php echo e($value->name); ?></a></h5>
                                    <p class="price with-discount"><?php echo e($value->price); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1><?php echo e(__('Top Viewed')); ?></h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    <?php $__currentLoopData = $topviewed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="<?php echo e(asset($value->path)); ?>" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#"><?php echo e($value->name); ?></a></h5>
                                    <p class="price with-discount"><?php echo e($value->price); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/front/index.blade.php ENDPATH**/ ?>