
<?php $__env->startSection('content'); ?>

    <?php if(session('status')): ?>
        <div class="<?php echo e(@session(('status'))); ?>" >
            <p class="text-center"><?php echo e(__(session('message'))); ?></p>
        </div>
    <?php endif; ?>
    <section class="contact-us section">
        <div class="container">
            <div class="contact-head">
            <div class="row">
                    <?php echo $__env->make('layouts.accountnavigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-9 col-md-8 col-12">
                                    <div class="col-12">
                                        <div class="form-main">
                                            <div class="title">
                                                <h4><?php echo e(__('Create Address')); ?></h4>
                                            </div>
                                            <form class="form" method="POST" action="<?php echo e(route('front.account.addAddress.post')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('ADDRESS TITLE')); ?><span>*</span></label>
                                                            <?php $__errorArgs = ['addressTitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span style="color: #bd081c"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <input name="addressTitle" type="text" placeholder="" value="<?php echo e(old('addressTitle')); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('ADDRESS')); ?><span>*</span></label>
                                                            <?php $__errorArgs = ['addressDescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span style="color: #bd081c"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <textarea name="addressDescription" id="" cols="30" rows="10"><?php echo e(old('addressDescription')); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('PROVINCE')); ?><span>*</span></label>
                                                            <?php $__errorArgs = ['province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span style="color: #bd081c"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <input name="province" type="text" placeholder="" value="<?php echo e(old('province')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('DISTRICT')); ?><span>*</span></label>
                                                            <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span style="color: #bd081c"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <input name="district" type="text" placeholder="" value="<?php echo e(old('district')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('COUNTRY')); ?><span>*</span></label>
                                                            <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span style="color: #bd081c"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <input name="country" type="text" placeholder="" value="<?php echo e(old('country')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('ZIP CODE')); ?><span>*</span></label>
                                                            <?php $__errorArgs = ['zipCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span style="color: #bd081c"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <input name="zipCode" type="text" placeholder="" value="<?php echo e(old('zipCode')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="btn "><?php echo e(__('CREATE ADDRESS')); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
            </div>
        </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/front/addaddress.blade.php ENDPATH**/ ?>