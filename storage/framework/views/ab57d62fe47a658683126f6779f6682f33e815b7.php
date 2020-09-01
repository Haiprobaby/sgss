<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="late_enrol_collapse">
<div id="enrol">
  <br>
  <h1>Late Enrolment</h1>
<table class="table table-bordered">
  <thead>
    <tr class="table-info">
      
      <th scope="col">Term</th>
      <th scope="col">Rate</th>
      <th scope="col">Options</th>
      
    </tr>
  </thead>
  
  <tbody>
    <?php $__currentLoopData = $late; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $late): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        
        <td><?php echo e($late->entry_date); ?></td>
        <td><?php echo e($late->percent_of_annual_tuition); ?></td>
        
        <td>
          
          <a href="#" id="<?php echo e($late->id); ?>" class="btn btn-primary edit_enrol"  data-toggle="modal" data-target="#late_enrol" data-whatever="@mdo">Edit</a>
        </td>
        
      </tr>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>

<?php echo $__env->make('backEnd.feesCollection.fee_policies.modals.edit_late_enrol', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/feesCollection/fee_policies/late_enrol.blade.php ENDPATH**/ ?>