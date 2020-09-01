
<?php $__env->startSection('main_content'); ?>
<section class="container box-1420">
<div class="banner-inner">
            <img width="100%" src="https://sgstar.edu.vn/images/banner/summercamp.png">
        </div>
</section>
<div class="container">

		
		<h1>Careers </h1>
 		

		<div class="col">
            <div class="row">
            	<?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 item" >
                	<a href="view-career/<?php echo e($career->id); ?>" title="View Details">
                    <div class="card" >
                    	<div class="ItemImage">
                        <img class="card-img-top" src="//img.nordangliaeducation.com/resources/asia/_filecache/65c/c1b/198965-cropped-w300-h185-of-1-FFFFFF-student-wellbeing--bis-hcmc-thumbnail.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e($career->name); ?></h4>
                           
                        </div>
                    </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/frontEnd/careers.blade.php ENDPATH**/ ?>