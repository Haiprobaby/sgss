Name : <?php echo e($data['name']); ?><br>
Gender : <?php echo e($data['sex']); ?><br>
Phone : <?php echo e($data['phone']); ?><br>
Email : <?php echo e($data['email']); ?><br>
Message : <?php echo e($data['message']); ?><br>

Curriculum Vitae:
<img src="<?php echo e($message->embed(asset('public/tmp_image/'.$data['cv']))); ?>"><?php /**PATH C:\wamp64\www\SGSS\resources\views/frontEnd/job_apply_details.blade.php ENDPATH**/ ?>