
<?php $__env->startSection('content'); ?>

    <?php if(\Illuminate\Support\Facades\Auth::check()): ?>

    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <form action="<?php echo e(route('front.completeShopping.post')); ?>" method="POST" style="width: 100%">
                            <?php echo csrf_field(); ?>
                            <table class="table shopping-summery">
                                <thead>
                                <tr class="main-hading">
                                    <th colspan="2" class="text-left"><?php echo e(__('Choose Address')); ?></th>
                                    <th></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="product-des" data-title="Description">
                                            <input type="radio" name="address" value="<?php echo e($value->id); ?>" checked>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des"><a href="#"><?php echo e($value->addressTitle); ?></a></p>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des"><a href="#"><?php echo e($value->addressDescription); ?></a></p>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des"><a href="#"><?php echo e($value->province); ?></a></p>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-des"><a href="#"><?php echo e($value->district); ?></a></p>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="float-right">
                                <input type="submit" class="btn" value="<?php echo e(__('Pay')); ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php else: ?>


            <div class="text-center" style="margin-top: 50px;height: 150px">

                <?php echo e(__('In order to continue')); ?> <a href="<?php echo e(route('login')); ?>" class=""><span style="color:#f7941d"><?php echo e(__('Login')); ?></span></a>  <a href="<?php echo e(route('register')); ?>">
                <?php echo e(__('or')); ?>    <span style="color:#f7941d"><?php echo e(__('Register')); ?></span>
                </a>

            </div>




    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/front/completeshopping.blade.php ENDPATH**/ ?>