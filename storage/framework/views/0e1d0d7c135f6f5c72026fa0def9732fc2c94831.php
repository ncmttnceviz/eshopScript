
<?php $__env->startSection('content'); ?>
            <?php if(session('status')): ?>
                <div class="<?php echo e(session('status')); ?> " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> <?php echo e(__(session('message'))); ?>

                </div>
            <?php endif; ?>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo e(__('Products')); ?></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Product Name')); ?></th>
                            <th><?php echo e(__('Stock')); ?></th>
                            <th><?php echo e(__('Add/Remove')); ?> / <?php echo e(__('Trends')); ?></th>
                            <th><?php echo e(__('Add/Remove')); ?> / <?php echo e(__('Hot Item')); ?></th>
                            <th><?php echo e(__('Edit')); ?></th>
                            <th><?php echo e(__('Remove')); ?> / <?php echo e(__('Publish')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kay => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value['name']); ?></td>
                            <td><?php echo e($value['stock']); ?></td>
                            <td>
                                <?php if($value['status'] == 0 and $value['publish']==1): ?>
                                    <a href="<?php echo e(route('admin.product.trendHotStatus',['id'=>$value['id'],'status'=>1])); ?>"><button type="button" class="btn btn-success"><i class="fa fa-trash-o"></i> <?php echo e(__('Add')); ?></button></a>
                                <?php elseif($value['status'] == 1 and $value['publish']==1): ?>
                                    <a href="<?php echo e(route('admin.product.trendHotStatus',['id'=>$value['id'],'status'=>0])); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> <?php echo e(__('Remove')); ?></button></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($value['status'] == 0 and $value['publish']==1): ?>
                                    <a href="<?php echo e(route('admin.product.trendHotStatus',['id'=>$value['id'],'status'=>2])); ?>"><button type="button" class="btn btn-success"><i class="fa fa-trash-o"></i> <?php echo e(__('Add')); ?></button></a>
                                <?php elseif($value['status'] == 2 and $value['publish']==1): ?>
                                    <a href="<?php echo e(route('admin.product.trendHotStatus',['id'=>$value['id'],'status'=>0])); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> <?php echo e(__('Remove')); ?></button></a>
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo e(route('admin.product.edit',['id'=>$value['id']])); ?>"><button type="button" class="btn btn-warning"><?php echo e(__('Edit')); ?></button></a></td>
                            <td>
                                <?php if($value['publish'] == 1): ?>
                                <a href="<?php echo e(route('admin.product.publish',['id'=>$value['id'],'status'=>0])); ?>"><button type="button" class="btn btn-success"><i class="fa fa-trash-o"></i> <?php echo e(__('Remove')); ?></button></a>
                                <?php elseif($value['publish'] == 0): ?>
                                    <a href="<?php echo e(route('admin.product.publish',['id'=>$value['id'],'status'=>1])); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> <?php echo e(__('Publish')); ?></button></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/admin/product/index.blade.php ENDPATH**/ ?>