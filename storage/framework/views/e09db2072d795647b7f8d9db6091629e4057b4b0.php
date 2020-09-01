
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="withdraw_collapse">

<div id="withdraw">
  <br>
    <h1>Early Withdrawal</h1>
    
    <table class="table table-bordered">
      <thead>
        <tr class="table-info">
            <th scope="col">Withdrawal Date</th>
            <th scope="col">Rate of refundable</th>
            <th scope="1">Options</th>
        </tr>
        
      </thead>
      <tbody>
        <?php $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($withdraw2->withdraw_date); ?></td>
            <td><?php echo e($withdraw2->refund_rate); ?></td>
            <td>
          
          <a href="#" id="<?php echo e($withdraw2->id); ?>" class="btn btn-primary edit_withdraw"  data-toggle="modal" data-target="#edit_withdraw" data-whatever="@mdo">Edit</a>
        </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tr>
      </tbody>
      
    </table>
</div>
</div>
</div>
</div>

<?php echo $__env->make('backEnd.feesCollection.fee_policies.modals.edit_withdraw', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/feesCollection/fee_policies/withdraw.blade.php ENDPATH**/ ?>