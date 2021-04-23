
<?php $__env->startSection('content'); ?>


    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <?php echo $__env->make('layouts.accountnavigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-12">

                    <?php if(session('status')): ?>
                        <div class="<?php echo e(@session(('status'))); ?>" >
                            <p class="text-center"><?php echo e(__(session('message'))); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <form action="<?php echo e(route('front.account.edit')); ?>" method="POST" style="width: 100%">
                            <?php echo csrf_field(); ?>
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"><?php echo e(__('Name')); ?></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="name" value="<?php echo e($userData[0]->name); ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"><?php echo e(__('Surname')); ?></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="surname"value="<?php echo e($userData[0]->surname); ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"><?php echo e(__('Phone Number')); ?></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="telephoneNumber" value="<?php echo e($userData[0]->telephoneNumber); ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn" value="<?php echo e(__('Edit')); ?>" style="float: right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top" style="padding: 18px 5px 12px 50px;!important;">
                                <?php echo e(__('My Addresses')); ?>

                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <?php if($data->count() > 0): ?>
                            <table class="table shopping-summery">
                                <thead>
                                <tr class="main-hading">
                                    <th><?php echo e(__('ADDRESS TITLE')); ?></th>
                                    <th></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
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
                                    <td class="action" data-title="Remove"><a href="<?php echo e(route('front.account.editAddress',['id'=>$value->id])); ?>"><i class="ti-write remove-icon"></i></a></td>
                                    <td class="action" data-title="Remove"><a href="<?php echo e(route('front.account.deleteAddress',['id'=>$value->id])); ?>"><i class="ti-trash remove-icon"></i></a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/front/account.blade.php ENDPATH**/ ?>