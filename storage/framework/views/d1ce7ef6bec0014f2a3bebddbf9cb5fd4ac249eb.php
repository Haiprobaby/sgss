
<?php $__env->startSection('main_content'); ?>

<!--CAI NAY CUA HAI-->
<section class="container box-1420">
<div class="banner-inner">
            <img width="100%" src="https://sgstar.edu.vn/images/banner/summercamp.png">
        </div>
</section>
<section class="container news-lastest">
    <h4>Lastest posts</h4>
    <br>
    <div class="col nen">
        <div class="row">
            <div class="col-lg-5 item">
                <a href="<?php echo e(url('news-details/'.$hotnews->id)); ?>" title="View Details">
                <div class="card news-card h-100" >
                    <div class="zoom img-hover-zoom">
                        <img class="card-img-top" src="<?php echo e(asset($hotnews->image)); ?>"  alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h5><?php echo e(\Illuminate\Support\Str::limit($hotnews->news_title,70)); ?></h5>
                        </div>
                        <div class="card-description">
                            <p class="card-text"><?php echo e($hotnews->description); ?></p>
                        </div>                           
                    </div>
                        
                </div>
                </a>
            </div>
            <div class="col-lg-7">
                    <div class="row">
                        <?php $__currentLoopData = $newslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 item" >
                            <a href="<?php echo e(url('news-details/'.$news->id)); ?>" title="View Details">
                            <div class="card news-card h-100" >
                                <div class="zoom img-hover-zoom">
                                <img class="card-img-top" src="<?php echo e(asset($news->image)); ?>" height="auto" width="auto" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5><?php echo e(\Illuminate\Support\Str::limit($news->news_title,70)); ?></h5>
                                    </div>
                                                            
                                </div>
                                
                            </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
            </div>

        </div>
    </div>
    <br>
</section>
<div class="topnav" id="myTopnav">
    <div class="container">
          <a href="<?php echo e(url('/')); ?>/news-page" class="<?php if(isset($id_cate)): ?> no-active <?php else: ?> active <?php endif; ?>" >Home</a>
          <?php $__currentLoopData = $list_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(url('/')); ?>/by-category/<?php echo e($cate->id); ?>" class="<?php if(isset($id_cate)&&$id_cate == $cate->id): ?> active <?php else: ?> no-active <?php endif; ?>" ><?php echo e($cate->category_name); ?></a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
    </div>
    
</div>
<div class="container" >
    <div id="subcate-field">
    <?php if(isset($list_subcate)): ?>
        <?php $__currentLoopData = $list_subcate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(url('/')); ?>/by-subcategory/<?php echo e($subcate->id); ?>" type="button" class="btn btn-warning subcate-list <?php if(isset($sub_cate_id) && $sub_cate_id == $subcate->id): ?> active <?php endif; ?>"><?php echo e($subcate->sub_category_name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <div class="row">
        <?php $__currentLoopData = $latest_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="col-lg-4 item" >
                            <a href="<?php echo e(url('news-details/'.$lastest->id)); ?>" title="View Details">
                            <div class="card news-card h-100" >
                                <div class="zoom img-hover-zoom">
                                <img class="card-img-top" src="<?php echo e(asset($lastest->image)); ?>" height="auto" width="auto" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5><?php echo e(\Illuminate\Support\Str::limit($lastest->news_title,70)); ?></h5>
                                    </div>
                                                            
                                </div>
                                
                            </div>
                            </a>
                        </div>                                      
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>    
    <?php endif; ?>
    </div>
    <?php if(isset($newslist_by_cate)): ?>
    <div class="row">
        <?php $__currentLoopData = $newslist_by_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news_byCate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
                <div class="col-12 col-md-6 col-lg-4 item" >
                    <a href="<?php echo e(url('news-details/'.$news_byCate->id)); ?>" title="View Details">
                    <div class="card" >
                        <div class="ItemImage">
                        <img class="card-img-top" src="<?php echo e(asset($news_byCate->image)); ?>" height="auto" width="auto" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e(\Illuminate\Support\Str::limit($news_byCate->news_title,50)); ?></h4>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>                  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>        
    <?php endif; ?>
    <?php if(isset($id_cate)): ?>
        <?php if(isset($sub_cate_id)): ?>
            <input type="hidden" name="" id="check" value="<?php echo e($sub_cate_id); ?>">
            <div class="float-right">
                <a href="<?php echo e(url('/')); ?>/category-items/<?php echo e($sub_cate_id); ?>" type="button" class="btn btn-primary">See More</a> 
            </div>
        <?php else: ?>
            <input type="hidden" name="" id="check" value="<?php echo e($id_cate); ?>">
            <div class="float-right">
                <a href="<?php echo e(url('/')); ?>/category/<?php echo e($id_cate); ?>" type="button" class="btn btn-primary">See More</a> 
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
    
      
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
            var check = $('#check').val();
            var destination = $("#myTopnav").offset().top-160;     
            if(check.length > 0)
            {
                $('html,body').animate({
                    scrollTop: destination},
                    500);
            }
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/frontEnd/home/light_news_category.blade.php ENDPATH**/ ?>