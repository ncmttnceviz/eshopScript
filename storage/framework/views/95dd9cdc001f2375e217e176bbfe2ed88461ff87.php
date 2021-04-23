
<?php $__env->startSection('content'); ?>

    <div class="panel">
        <?php if(session('status')): ?>
            <div class="<?php echo e(session('status')); ?> " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-times-circle"></i> <?php echo e(__(session('message'))); ?>

            </div>
        <?php endif; ?>
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Choose Logo')); ?></h3>
        </div>
        <div class="panel-body">

            <form action="<?php echo e(route('admin.config.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file"  name="logo"  style="display: inline;">
                <input type="hidden" value="logo" name="config">
                <input type="submit" class="btn btn-warning" value="<?php echo e(__('Edit')); ?>">
            </form>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Shipping Settings')); ?></h3>
        </div>
        <div class="panel-body">

            <form action="<?php echo e(route('admin.config.update')); ?>" method="POST">
                <label for=""><?php echo e(__('Shipping Price')); ?></label>
                <div class="input-group">
                    <input type="text" class="form-control"  name="shippingPrice" value="<?php echo e($data[0]['shippingPrice']); ?>">
                </div>
                <br>
                <label for=""><?php echo e(__('Free Shipping Threshold')); ?></label>
                <div class="input-group">
                    <input type="text"  class="form-control" name="freeShippingThreshold" value="<?php echo e($data[0]['freeShippingThreshold']); ?>">
                </div>
                <br>
                <input type="hidden" value="shipping" name="config">
                <input type="submit" class="btn btn-warning" value="<?php echo e(__('Edit')); ?>">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>

    <div class="panel">

        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Config')); ?></h3>
        </div>
        <div class="panel-body">

            <form action="<?php echo e(route('admin.config.update')); ?>" method="POST">

            <label for=""><?php echo e(__('Site Name')); ?></label>
            <div class="input-group">
                <input class="form-control" type="text" name="siteName" value="<?php echo e($data[0]['siteName']); ?>">
            </div>
            <br>

            <label for=""><?php echo e(__('Site Title')); ?></label>
            <div class="input-group">
                <input class="form-control" type="text" name="metaTitle" value="<?php echo e($data[0]['metaTitle']); ?>">
            </div>
            <br>

            <label for=""><?php echo e(__('Site Description')); ?></label>
            <div class="input-group">
                <input class="form-control" type="text" name="metaDescription" value="<?php echo e($data[0]['metaDescription']); ?>">
            </div>
            <br>

            <label for=""><?php echo e(__('Keywords')); ?></label>
            <div class="input-group">
                <input class="form-control" type="text" name="metaKeywords" value="<?php echo e($data[0]['metaKeywords']); ?>">
            </div>
            <br>

            <label for=""><?php echo e(__('Address')); ?></label>
            <div class="input-group">
                <textarea name="address" id="" class="form-control" cols="30" rows="5"><?php echo e($data[0]['address']); ?></textarea>
            </div>
            <br>

            <label for=""><?php echo e(__('Phone Number')); ?></label>
            <div class="input-group">
                <input class="form-control" type="text" name="phoneNumber" value="<?php echo e($data[0]['phoneNumber']); ?>">
            </div>
            <br>
                <input type="hidden" value="general" name="config">
            <input type="submit" class="btn btn-warning" value="<?php echo e(__('Edit')); ?>">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>


    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Social Media Links')); ?></h3>
        </div>
        <div class="panel-body">

            <form action="<?php echo e(route('admin.config.update')); ?>" method="POST">

                <label for=""><?php echo e(__('Facebook')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="SocialFacebook" value="<?php echo e($data[0]['SocialFacebook']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('Twitter')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="SocialTwitter" value="<?php echo e($data[0]['SocialTwitter']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('Instagram')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="SocialInstagram" value="<?php echo e($data[0]['SocialInstagram']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('Pinterest')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="SocialPinterest" value="<?php echo e($data[0]['SocialPinterest']); ?>">
                </div>
                <br>
                <input type="hidden" value="social" name="config">
                <input type="submit" class="btn btn-warning" value="<?php echo e(__('Edit')); ?>">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Iyzico Api Settings')); ?></h3>
        </div>
        <div class="panel-body">

            <form action="<?php echo e(route('admin.config.update')); ?>" method="POST">

                <label for=""><?php echo e(__('paymentApi')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="paymentApi" value="<?php echo e($data[0]['paymentApi']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('paymentSecretKey')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="paymentSecretKey" value="<?php echo e($data[0]['paymentSecretKey']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('paymentBaseUrl')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="paymentBaseUrl" value="<?php echo e($data[0]['paymentBaseUrl']); ?>">
                </div>
                <br>
                <input type="hidden" value="payment" name="config">
                <input type="submit" class="btn btn-warning" value="<?php echo e(__('Edit')); ?>">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>


    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Mail Settings')); ?></h3>
        </div>
        <div class="panel-body">

            <form action="<?php echo e(route('admin.config.update')); ?>" method="POST">

                <label for=""><?php echo e(__('Mail Address')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailAddress" value="<?php echo e($data[0]['mailAddress']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('Mail Host')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailHost" value="<?php echo e($data[0]['mailHost']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('Smtp Port')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailSmtpPort" value="<?php echo e($data[0]['mailSmtpPort']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('SSL / TLS')); ?></label>
                <div class="input-group">
                    <select name="mailEncryption" id="" class="form-control">
                        <option value="ssl" <?php if($data[0]['mailEncryption'] == "ssl"): ?> selected <?php endif; ?>>SSL</option>
                        <option value="tls" <?php if($data[0]['mailEncryption'] == "tls"): ?> selected <?php endif; ?>>TLS</option>
                    </select>
                </div>
                <br>

                <label for=""><?php echo e(__('Username')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailUser" value="<?php echo e($data[0]['mailUser']); ?>">
                </div>
                <br>

                <label for=""><?php echo e(__('Password')); ?></label>
                <div class="input-group">
                    <input class="form-control" type="text" name="mailPassword" value="<?php echo e($data[0]['mailPassword']); ?>">
                </div>
                <br>
                <input type="hidden" value="mail" name="config">
                <input type="submit" class="btn btn-warning" value="<?php echo e(__('Edit')); ?>">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>

    <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Change Language')); ?></h3>
    </div>
    <div class="panel-body">

        <form action="<?php echo e(route('admin.config.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="input-group">
                <select name="language" id="" class="form-control">
                    <option value="tr" <?php if($data[0]['language'] == "tr"): ?> selected <?php endif; ?>>TR</option>
                    <option value="en" <?php if($data[0]['language'] == "en"): ?> selected <?php endif; ?>>EN</option>
                </select>
            </div>
            <br>
            <input type="hidden" value="language" name="config">
            <input type="submit" class="btn btn-warning" value="<?php echo e(__('Edit')); ?>">
        </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/admin/config/index.blade.php ENDPATH**/ ?>