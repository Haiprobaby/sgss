<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_content'); ?>
<section class="container">
    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="post-title">
                <h3><?php echo e($news->news_title); ?></h3>
            </div>
            <div class="news-body">
                <p><?php echo $news->news_body; ?></p>
            </div>            
        </div>
        <div class="col-lg-3 col-md-0 col-sm-0">
            <div class="right-col">
                <a href="https://www.facebook.com/saigonstarschool" target="_blank" title="View Details">
                    <div>
                        <div class="ItemImage">
                            <img class="card-img" src="//img.nordangliaeducation.com/resources/asia/_filecache/65c/c1b/198965-cropped-w300-h185-of-1-FFFFFF-student-wellbeing--bis-hcmc-thumbnail.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><strong>Have you seen our social media wall?</strong></h5>
                            <p class="card-text">Get the feel of life at Saigonstar International School through our social media wall,where our school community share social posts using our very own hastag.</p>
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <h4>Related Posts</h4>
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/frontEnd/home/light_news_details.blade.php ENDPATH**/ ?>