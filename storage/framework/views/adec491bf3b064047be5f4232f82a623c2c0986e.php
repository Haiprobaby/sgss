
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="grades_collapse">

<div id="grades">
  <br>

    <h1>School Grades</h1>
    <table class="table table-bordered">
      <a href="" class="btn btn-primary add-discount" onclick="setdate()" data-toggle="modal" data-target="#addgrade" data-whatever="@mdo">Add</a>
      <thead>
        <tr class="table-success">
            <th scope="col" rowspan="2">Child Born between</th>  
            <?php $__currentLoopData = $schoolyears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
              <th scope="col"><?php echo e($value); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <th>Option</th>
        </tr>
       
      </thead>
      <tbody>
          
          <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
              <td><?php echo e($key); ?></td>
              <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($year==null||$year->id_year==null): ?>
                <td>N/A</td>
                
                <?php else: ?>
                <td><?php echo e($year->years->title); ?></td>
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

               
                <?php if($value->count()==2): ?>
                  <td>N/A</td>
                 
                <?php elseif($value->count()==1): ?>
                <td>N/A</td>               
                <td>N/A</td>
                <?php elseif($value->count()==0): ?>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>

                <?php endif; ?>
                
                <td>
                  <a href="/delete-grade/<?php echo e($id[$i++]); ?>" onclick="return confirm('are you sure?')"  class="btn btn-danger ">Xóa</a>
                </td>               
            </tr>                      
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
          
      </tbody>    
    </table>
   
</div> 
</div>
</div>
</div>
<?php echo $__env->make('backEnd.feesCollection.fee_policies.modals.add_grade', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/feesCollection/fee_policies/grades.blade.php ENDPATH**/ ?>