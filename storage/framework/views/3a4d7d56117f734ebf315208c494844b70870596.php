
<?php $__env->startSection('content'); ?>
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Stats')); ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-download"></i></span>
                        <p>
                            <span class="number"><?php echo e($pendingOrders); ?></span>
                            <a href="<?php echo e(route('admin.orders.index',['status'=>0])); ?>" class="">  <span class="title"><?php echo e(__('Pending Orders')); ?></span></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                        <p>
                            <span class="number"><?php echo e($ordersInCargo); ?></span>
                            <a href="<?php echo e(route('admin.orders.index',['status'=>1])); ?>" class="">  <span class="title"><?php echo e(__('Orders In Cargo')); ?></span></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-eye"></i></span>
                        <p>
                            <span class="number"><?php echo e($totalEarnings); ?></span>
                            <span class="title"><?php echo e(__('Total Earnings')); ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>