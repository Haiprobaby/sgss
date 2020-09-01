
<?php $__env->startSection('main_content'); ?>

<!--CAI NAY CUA HAI-->

<section class="container box-1420">
<div class="banner-inner">
            <img width="100%" src="https://sgstar.edu.vn/images/banner/summercamp.png">
        </div>
</section>
<div class="container">

        
        <h3><?php echo e($name_cate->category_name); ?></h3>
        

        <div class="col">
            <div class="row">
                <p> <?php echo e($name_cate->description); ?></p>
                <?php $__currentLoopData = $subcate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 item" >
                    <a href="<?php echo e(url('category-items/'.$cate->id)); ?>" title="View Details">
                    <div class="card news-card h-100" >
                        <div class="ItemImage">
                        <img class="card-img-top" src="<?php echo e(asset($cate->image_path)); ?>\<?php echo e($cate->image); ?>" height="auto" width="auto" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e($cate->sub_category_name); ?></h4>
                            <p class="card-text"></p>
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
            <?php echo $subcate->links(); ?>

        </div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/frontEnd/home/light_news_sub_category.blade.php ENDPATH**/ ?>