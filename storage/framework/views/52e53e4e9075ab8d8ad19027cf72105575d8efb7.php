
<?php $__env->startSection('main_content'); ?>
<br>
<style type="text/css">

</style>
<!-- Start of Early year -->
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<div id="accordion">
	  <div class="card">
	    <div class="card-header" id="headingOne">
	      <h5 class="mb-0">
	        <button class="btn btn-link" id="btn-early" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	         Early Year Group
	        </button>
	      </h5>
	    </div >

	    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
	      
	       <div class="card-body">		
			<h4 class="admission-title">Tuition Fees</h4>
			<table class="table table-bordered">
			  <thead>
			    <tr class="table-info">
			      <th scope="col">Year Group</th>		     
			      <th scope="col">Option A</th>
			      
			      
			      <th scope="col" colspan="3">Option B</th>
			    </tr>

			  </thead>
			  <tbody>
			  	
			  	<?php $__currentLoopData = $early; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $years): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <tr>
			      <th scope="row"><?php echo e($years->title); ?></th>
			      <td><?php echo e(number_format($years->tuition_payment_A)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B1)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B2)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B3)); ?></td>
			    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    <th scope="row"></th>
			  		<td>Due by 15th May</td>
			  		
			  		<td>Due by 15th May</td>
			  		<td>Before starting of new academic year</td>
			  		<td>Before of term 3</td>
			  </tbody>
			  <tfoot>
			  	
			  </tfoot>
			</table>
			<br>
			<h4>Other Fees</h5>
			<table class="table table-bordered">
			  <thead>
			    <tr  class="table-success">
			      <th scope="col">Name</th>		     
			      <th scope="col">Description</th>
			       
			      <th scope="col">Price</th>
			    </tr>

			  </thead>
			  <tbody>
			  	
			  	<?php $__currentLoopData = $early_fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <tr >
			      <th scope="row"><?php echo e($fees->Name); ?></th>
			      <td><?php echo e($fees->description); ?></td>
			      <td><?php echo e(number_format($fees->price)); ?></td>
			      
			    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </tbody>
			</table>
		
	  </div>
	</div>
	<div class="col-md-2"></div>
</div>
<!-- End of Early year -->
<!-- Start of Primary year -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" id="btn-primary" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Primary Year Group
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <h4>Tuition Fees</h4>
		<table class="table table-bordered">
		  <thead>
		    <tr class="table-info">
		      <th scope="col">Year Group</th>		     
		      <th scope="col">Option A</th>
		      
		      
		      <th scope="col" colspan="3">Option B</th>
		    </tr>

		  </thead>
		  <tbody>
		  	
		  	<?php $__currentLoopData = $primary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $years): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr>
		       	  <th scope="row"><?php echo e($years->title); ?></th>
			      <td><?php echo e(number_format($years->tuition_payment_A)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B1)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B2)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B3)); ?></td>
		    </tr>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    <th scope="row"></th>
		  		<td>Due by 15th May</td>
		  		
		  		<td>Due by 15th May</td>
		  		<td>Before starting of new academic year</td>
		  		<td>Before of term 3</td>
		  </tbody>
		  <tfoot>
		  	
		  </tfoot>
		</table>
		<br>
		<h4>Other Fees</h4>
			<table class="table table-bordered">
			  <thead>
			    <tr  class="table-success">
			      <th scope="col">Name</th>		     
			      <th scope="col">Description</th>
			       
			      <th scope="col">Price</th>
			    </tr>

			  </thead>
			  <tbody>
			  	
			  	<?php $__currentLoopData = $primary_fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <tr >
			      <th scope="row"><?php echo e($fees->Name); ?></th>
			      <td><?php echo e($fees->description); ?></td>
			      <td><?php echo e(number_format($fees->price)); ?></td>
			      
			    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </tbody>
			</table>
      </div>
    </div>
  </div>
  <!-- End of Primary year -->
  <!-- Start of Middle year -->
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" id="btn-middle" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Middle Year Group
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <h4>Tuition Fees</h4>
		<table class="table table-bordered">
		  <thead>
		    <tr class="table-info">
		      <th scope="col">Year Group</th>		     
		      <th scope="col">Option A</th>
		      
		      
		      <th scope="col" colspan="3">Option B</th>
		    </tr>

		  </thead>
		  <tbody>
		  	
		  	<?php $__currentLoopData = $middle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $years): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr>
		          <th scope="row"><?php echo e($years->title); ?></th>
			      <td><?php echo e(number_format($years->tuition_payment_A)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B1)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B2)); ?></td>
			      <td><?php echo e(number_format($years->tuition_payment_B3)); ?></td>
		    </tr>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    <th scope="row"></th>
		  		<td>Due by 15th May</td>
		  		
		  		<td>Due by 15th May</td>
		  		<td>Before starting of new academic year</td>
		  		<td>Before of term 3</td>
		  </tbody>
		  <tfoot>
		  	
		  </tfoot>
		</table>
		<br>
		<h4>Other Fees</h4>
			<table class="table table-bordered">
			  <thead>
			    <tr  class="table-success">
			      <th scope="col">Name</th>		     
			      <th scope="col">Description</th>
			       
			      <th scope="col">Price</th>
			    </tr>

			  </thead>
			  <tbody>
			  	
			  	<?php $__currentLoopData = $middle_fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <tr >
			      <th scope="row"><?php echo e($fees->Name); ?></th>
			      <td><?php echo e($fees->description); ?></td>
			      <td><?php echo e(number_format($fees->price)); ?></td>
			      
			    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </tbody>
			</table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- End of middle year-->

 <br>
<div class="row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<h4>Bus Fee</h4>
		<table class="table table-bordered">
		  <thead>
		   	<tr class="table-info">
		      	<th scope="col">Location</th>
		      	<?php $__currentLoopData = $bus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		      	<th><?php echo e($bus1->title); ?></th>
		      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		     		      
		    </tr>
		    <tr>
		  		<td scope="col">Price</td>
		  		<?php $__currentLoopData = $bus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		      	<td><?php echo e(number_format($bus2->far)); ?>/year</td>
		      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		  	</tr>
		  </thead>
		  
		</table>
		<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus_note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<p><?php echo e($bus_note->Bus_Fee); ?></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<h4>Loyalty & Sibling Discount</h4>
		<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loyalty_note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<p><?php echo e($loyalty_note->Loyalty_Sibling_Discount); ?></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<table class="table table-bordered">
		  <thead>
		   	<tr class="table-success">
		      	  
			      <th scope="col">Name</th>
			      <th scope="col">1st Year</th>
			      <th scope="col">2nd Year</th>
			      <th scope="col">3rd Year</th>
			      <th scope="col">4th Year</th>
			      <th scope="col">5th Year +</th>
			       		      
		    </tr>
		   
		  </thead>
		  <tbody>
		  	<?php $__currentLoopData = $discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr >
		      
		        <td><?php echo e($discount->name); ?></td>
		        <td><?php echo e($discount->first_year); ?></td>
		        <td><?php echo e($discount->second_year); ?></td>
		        <td><?php echo e($discount->third_year); ?></td>
		        <td><?php echo e($discount->fourth_year); ?></td>
		        <td><?php echo e($discount->fifth_and_subsequent_years); ?></td>
		      
		      
		    </tr>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </tbody>
		  
		</table>
		
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<h4>Late Enrolment</h4>
		<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $late_note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<p><?php echo e($late_note->Late_Enrolment); ?></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<table class="table table-bordered">
		  <thead>
		   	<tr class="table-active">
		      	<th >Entry Date</th>
		      	<?php $__currentLoopData = $late_enrolment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $late1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		      	<th><?php echo e($late1->entry_date); ?></th>
		      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		     		      
		    </tr>
		    <tr>
		  		<th >% of annual tuition</th>
		  		<?php $__currentLoopData = $late_enrolment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $late2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		      	<td><?php echo e($late2->percent_of_annual_tuition); ?></td>
		      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		  	</tr>
		  </thead>
		  
		</table>
		<br>
		<b>Special Educational Needs (SEN)</b><br>
		<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SEN): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><?php echo e($SEN->Special_Educational_Needs); ?></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<h4>School Grades</h4>
		

		<table class="table table-bordered">
      
      <thead>
        <tr class="table-success">
            <th scope="col" rowspan="2">Child Born between</th>  
            <?php $__currentLoopData = $schoolyears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
              <th scope="col"><?php echo e($value); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
        </tr>
       
      </thead>
      <tbody>
       
          <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key); ?></td>
              <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($year->id_year==null): ?>
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


            </tr>  
                     
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
      </tbody>    
    </table>
		 <b> Late Payment</b><br>
		<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $late): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><?php echo e($late->Late_Payment); ?></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
	</div>
</div>


<br>
<div class="row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<h4>Early Withdrawal</h4>
		<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw_note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><?php echo e($withdraw_note->Early_Withdrawal); ?></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		<table class="table table-bordered">
		  <thead>
		   	<tr class="table-info">
		      	<th scope="col">Withdrawal Date</th>
		      	<?php $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		      	<th><?php echo e($withdraw1->withdraw_date); ?></th>
		      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		     		      
		    </tr>
		    <tr>
		  		<td scope="col">Rate of refundable</td>
		  		<?php $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		      	<td><?php echo e($withdraw2->refund_rate); ?></td>
		      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		  	</tr>
		  </thead>
		  
		</table>
		<p>- All fees are quoted in Vietnam Dong.</p>
		<p>- Please note that refunds cannot be made in the event of a force majeure. Force majeure event refers
		to or effect an which can not be reasonably anticipated or be under our control, e.g earthquakes,
		epidemics and other natural disasters.</p>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript">
		$( document ).ready(function() {
			   var early = $("#headingOne").offset().top;
			   var primary = $("#headingTwo").offset().top;
			   var middle = $("#headingThree").offset().top
		
		$("#btn-early").click(function() {
		    $('html,body').animate({
		        scrollTop: early},
		        1000);
		});

		$("#btn-primary").click(function() {
		    $('html,body').animate({
		        scrollTop: primary},
		        1000);
		});

		$("#btn-middle").click(function() {
		    $('html,body').animate({
		        scrollTop: middle},
		        1000);
		});

	});

	</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sgss\resources\views/frontEnd/home/admissions.blade.php ENDPATH**/ ?>