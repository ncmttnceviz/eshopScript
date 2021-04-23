
<?php $__env->startSection('content'); ?>
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title"><?php echo e(__('Categories')); ?></h3>
                            <ul class="categor-list">
                                <?php if($data[0]['type']==1): ?>
                                    <?php $__currentLoopData = \App\Models\Categories::where('mainCategoryID','=',$data[0]['mainCategoryID'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('front.category',['permalink'=>$value['permalink']])); ?>"><?php echo e($value['name']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php elseif($data[0]['type']==0): ?>
                                    <?php $__currentLoopData = \App\Models\Categories::where('type','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('front.category',['permalink'=>$value['permalink']])); ?>"><?php echo e($value['name']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="<?php echo e(route('front.product',['permalink'=>$value->permalink])); ?>">
                                            <img class="default-img" src="<?php echo e(asset(\App\Models\ProductImage::singleImage($value->id))); ?>" alt="#">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="<?php echo e(route('front.product',['permalink'=>$value->permalink])); ?>"><?php echo e($value->name); ?></a></h3>
                                        <div class="product-price">
                                            <span><?php echo e($value->price); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\eshop\eshopScript\resources\views/front/category.blade.php ENDPATH**/ ?>