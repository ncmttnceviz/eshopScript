
<?php $__env->startSection('content'); ?>

    <?php if(session('status')): ?>
        <div class="<?php echo e(@session(('status'))); ?>" >
       <p class="text-center"><?php echo e(__(session('message'))); ?></p>
        </div>
    <?php endif; ?>

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="form-main" style="padding: 0px" ">
                                    <div class="image" style="display: inline" id="sldimg" data="0">
                                        <div class="prew"  style="position: absolute;left: 13px;top: 180px;width: 40px"><button class="sld-button" data="left"><i class=" ti-arrow-left"></i></button></div>
                                        <div class="right" style="position: absolute;right: 2px;top: 180px;width: 40px"><button class="sld-button" data="right"><i class=" ti-arrow-right"></i></button></div>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img src="<?php echo e(asset($value->path)); ?>"  alt="A generic square placeholder image with rounded corners in a figure." class="sld-img" data="">
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="clearfix"></div>

                    </div>
                    </div>

                    <div class="col-lg-8 col-12">
                        <div class="quickview-content">
                            <h2><?php echo e($data[0]->name); ?></h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                </div>
                                <div class="quickview-stock">

                                </div>
                            </div>
                            <h3><?php echo e($data[0]->price); ?></h3>
                            <div class="quickview-peragraph">
                                <p><?php echo e($data[0]->metaDescription); ?></p>
                            </div>
                            <div class="quantity">
                                <form action="<?php echo e(route('front.addcart')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="total" id="total" class="input-number" data-min="1" data-max="<?php echo e($data[0]->stock); ?>" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--/ End Input Order -->
                            </div>
                            <br><br>
                            <div class="add-to-cart">

                                    <input type="hidden" name="product" value="<?php echo e($data[0]->id); ?>">
                                    <button type="submit" class="btn"><?php echo e(__('Add to cart')); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/front/product.blade.php ENDPATH**/ ?>