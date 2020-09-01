<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="discount_collapse">

<div id=discount>
  <br>
  <h1>Discount</h1>
<table class="table table-bordered">
  <a href="" class="btn btn-success add-discount" data-toggle="modal" data-target="#adddiscount" data-whatever="@mdo">Add</a>

  <thead>
    <tr class="table-info">
      
      <th scope="col">Name</th>
      <th scope="col">1st Year</th>
      <th scope="col">2nd Year</th>
      <th scope="col">3rd Year</th>
      <th scope="col">4th Year</th>
      <th scope="col">5th Year +</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  
  <tbody id="discount_table">
    <?php $__currentLoopData = $discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr >
        
        <td><?php echo e($discount->name); ?></td>
        <td><?php echo e($discount->first_year); ?></td>
        <td><?php echo e($discount->second_year); ?></td>
        <td><?php echo e($discount->third_year); ?></td>
        <td><?php echo e($discount->fourth_year); ?></td>
        <td><?php echo e($discount->fifth_and_subsequent_years); ?></td>
        <td>
          <a href="#" id="<?php echo e($discount->id); ?>" class="btn btn-primary edit-discount" onclick="edit_discount(<?php echo e($discount->id); ?>)" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</a>
          <button type="button"  class="btn btn-danger delete-discount" onclick="delete_discount(<?php echo e($discount->id); ?>)">Del</button>
        </td>
        
      </tr>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

</div>
</div>
</div>
</div>

<?php echo $__env->make('backEnd.feesCollection.fee_policies.modals.edit_discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.feesCollection.fee_policies.modals.add_discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/feesCollection/fee_policies/discount.blade.php ENDPATH**/ ?>