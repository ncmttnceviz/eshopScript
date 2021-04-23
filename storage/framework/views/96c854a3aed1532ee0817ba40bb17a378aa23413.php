
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel">
            <?php if(session('status')): ?>
                <div class="<?php echo e(session('status')); ?> " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> <?php echo e(__(session('message'))); ?>

                </div>
            <?php endif; ?>
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e(__('Edit Order')); ?></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo e(__('PRODUCT')); ?></th>
                        <th class="text-center"><?php echo e(__('UNIT PRICE')); ?></th>
                        <th class="text-center"><?php echo e(__('QUANTITY')); ?></th>
                        <th class="text-center"><?php echo e(__('TOTAL')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kay => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class=""><?php echo e($value->name); ?></td>
                            <td class="text-center"><?php echo e($value->price); ?></td>
                            <td class="text-center"><?php echo e($value->numberOfProducts); ?></td>
                            <td class="text-center"><?php echo e($value->totalPrice); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <br><br>
                <label for=""><b><?php echo e(__('Order Summary')); ?></b></label><br>
                <label for=""><?php echo e(__('Cart Subtotal')); ?> : <?php echo e($orderSummary[0]->subTotal); ?></label><br>
                <label for=""><?php echo e(__('Shipping')); ?>: <?php echo e($orderSummary[0]->shippingPrice); ?></label><br>
                <label for=""><?php echo e(__('Amount Paid')); ?>: <?php echo e($orderSummary[0]->cartTotal); ?></label><br>
                <br>
                <div class="col-12">
                    <label for=""><?php echo e(__('Customer Information')); ?></label><br>
                    <label for=""><?php echo e(__('Name')); ?> : <?php echo e($userData[0]->name); ?></label><br>
                    <label for=""><?php echo e(__('Email')); ?> : <?php echo e($userData[0]->email); ?></label><br>
                    <label for=""><?php echo e(__('Province')); ?> : <?php echo e($userData[0]->province); ?></label><br>
                    <label for=""><?php echo e(__('District')); ?> : <?php echo e($userData[0]->district); ?></label><br>
                    <label for=""><?php echo e(__('Address')); ?> : <?php echo e($userData[0]->addressDescription); ?></label><br>
                </div>



                <?php if($data[0]->status ==0): ?>
                <form action="<?php echo e(route('admin.orders.detail.post',['orderNumber'=>$data[0]->orderNumber])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <label for=""><?php echo e(__('Shipping Tracking Number')); ?></label><br>
                        <input type="text" class="form-control" name="shippingTrackingNumber">
                        <input type="hidden" class="form-control" name="email" value="<?php echo e($userData[0]->email); ?>">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="<?php echo e(__('Create')); ?>">
                </form>
                <?php elseif($data[0]->status == 1): ?>
                    <form action="<?php echo e(route('admin.orders.complete.post',['orderNumber'=>$data[0]->orderNumber])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <label for=""><?php echo e(__('Shipping Tracking Number')); ?> : <?php echo e($data[0]->shippingTrackingNumber); ?></label><br>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success" value="<?php echo e(__('Complete The Order')); ?>">
                    </form>
                <?php elseif($data[0]->status==2): ?>
                    <label for=""><?php echo e(__('Shipping Tracking Number')); ?>  :  <?php echo e($data[0]->shippingTrackingNumber); ?></label>
                <?php endif; ?>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/admin/order/edit.blade.php ENDPATH**/ ?>