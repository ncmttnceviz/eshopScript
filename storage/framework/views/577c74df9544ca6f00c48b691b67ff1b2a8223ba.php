        <div class="single-widget category">
            <h3 class="title"><?php echo e(__('My Information')); ?></h3>
            <ul class="categor-list">
                <a href="<?php echo e(route('front.account')); ?>">
                    <li><?php echo e(__('My Account')); ?></li>
                </a>
                <a href="<?php echo e(route('front.account.addAddress')); ?>">
                    <li><?php echo e(__('Add New Address')); ?></li>
                </a>
                <a href="<?php echo e(route('front.account.orders')); ?>">
                    <li><?php echo e(__('My Orders')); ?></li>
                </a>
            </ul>
        </div>
<?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/layouts/accountnavigation.blade.php ENDPATH**/ ?>