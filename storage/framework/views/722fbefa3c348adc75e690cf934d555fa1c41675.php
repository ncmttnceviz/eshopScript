

<?php $__env->startSection('content'); ?>
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4><?php echo e(\App\Helper\funcHelper::decodeAppName(config('app.name'))); ?></h4>
                                <h3><?php echo e(__('Enter Your Account Information')); ?></h3>
                            </div>
                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['style' => 'color:#cc3318','class' => 'mb-4','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['style' => 'color:#cc3318','class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            <form class="form" method="post" action="<?php echo e(route('login')); ?>">

                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="email" :value="__('Email')">Mail Adresi<span>*</span></label>
                                            <input id="email" type="email" name="email" :value="old('email')" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="password" :value="__('Password')">Şifre<span>*</span></label>
                                            <input id="password"  placeholder=""  type="password"  name="password"  required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600"><?php echo e(__('Remember me')); ?></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <?php if(Route::has('password.request')): ?>
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('password.request')); ?>">
                                                <?php echo e(__('Forgot your password?')); ?>

                                            </a>
                                        <?php endif; ?>

                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">  <?php echo e(__('Login')); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/auth/login.blade.php ENDPATH**/ ?>