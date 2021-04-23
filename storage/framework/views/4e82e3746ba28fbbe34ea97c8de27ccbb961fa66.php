
<?php $__env->startSection('content'); ?>

    <?php if(session('status')): ?>
        <div class="<?php echo e(@session(('status'))); ?>" >
            <p class="text-center"><?php echo e(__(session('message'))); ?></p>
        </div>
    <?php endif; ?>

    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                        <tr class="main-hading">
                            <th><?php echo e(__('PRODUCT')); ?></th>
                            <th></th>
                            <th class="text-center"><?php echo e(__('UNIT PRICE')); ?></th>
                            <th class="text-center"><?php echo e(__('QUANTITY')); ?></th>
                            <th class="text-center"><?php echo e(__('TOTAL')); ?></th>
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if($data->count() >0): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="image" data-title="No" style="padding: 0px;!important; padding-left: 5px"><img src="<?php echo e(asset($value->path)); ?>" alt="#" style="width: 100px;height: 136px"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="<?php echo e(route('front.product',['permalink'=>$value->permalink])); ?>"><?php echo e($value->name); ?></a></p>
                                <p class="product-des"><?php echo e($value->metaDescription); ?></p>
                            </td>
                            <td class="price" data-title="Price"><span><?php echo e($value->price); ?></span></td>
                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                  <?php echo e($value->numberOfProducts); ?>

                            </td>
                            <td class="total-amount" data-title="Total"><span><?php echo e(\App\Helper\cartHelper::getTotalPrice($value->price,$value->numberOfProducts)); ?></span></td>
                            <td class="action" data-title="Remove"><a href="<?php echo e(route('front.deleteItem',['id'=>$value->productID])); ?>"><i class="ti-trash remove-icon"></i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php elseif($data->count() == 0): ?>
                            <tr>
                                <td colspan="6"><p class="text-center"><?php echo e(__('There is no product in your shopping cart')); ?></p></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <?php if($data->count() > 0): ?>
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li><?php echo e(__('Cart Subtotal')); ?><span><?php echo e($value['subTotal']); ?></span></li>
                                        <li><?php echo e(__('Shipping')); ?><span><?php echo e($value['shippingPrice']); ?></span></li>
                                        <li class="last"><?php echo e(__('You Pay')); ?><span><?php echo e($value['cartTotal']); ?></span></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div class="button5">
                                        <a href="<?php echo e(route('front.clearCart')); ?>" class="btn"><?php echo e(__('Clean the Cart')); ?></a>
                                        <a href="<?php echo e(url('/')); ?>" class="btn"><?php echo e(__('Continue shopping')); ?></a>
                                        <a href="<?php echo e(route('front.completeShopping')); ?>" class="btn"><?php echo e(__('Complete Shopping')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- End Shop Newsletter -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/front/cart.blade.php ENDPATH**/ ?>