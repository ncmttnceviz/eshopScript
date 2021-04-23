
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(session('status')): ?>
                <div class="<?php echo e(session('status')); ?> " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-times-circle"></i> <?php echo e(__(session('message'))); ?>

                </div>
            <?php endif; ?>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo e(__('categories')); ?></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Category Name')); ?></th>
                            <th><?php echo e(__('Hit')); ?></th>
                            <th><?php echo e(__('Edit')); ?></th>
                            <th><?php echo e(__('Delete')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kay => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value['name']); ?></td>
                            <td><?php echo e($value['hit']); ?></td>
                            <td><a href="<?php echo e(route('admin.category.edit',['id'=>$value['id']])); ?>"><button type="button" class="btn btn-warning"><?php echo e(__('Edit')); ?></button></a></td>
                            <td><a href="<?php echo e(route('admin.category.delete',['id'=>$value['id']])); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> <?php echo e(__('Delete')); ?></button></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/admin/category/index.blade.php ENDPATH**/ ?>