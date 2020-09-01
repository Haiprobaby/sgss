<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="group_collapse">

<div id=groups>
  <br>
  <table class="table table-bordered">
  <thead>
    <tr class="table-primary">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <h2>Fee Groups</h2>
  <tbody>
    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <tr>
      <th scope="row"><?php echo e($group->id); ?></th>
      <td><?php echo e($group->Name); ?></td>
      <td><?php echo e($group->description); ?></td>
      <td>
        <a href="edit-fees/<?php echo e($group->id); ?>" class="btn btn-success">Edit</a>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
</div>
</div>
</div><?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/feesCollection/fee_policies/groups.blade.php ENDPATH**/ ?>