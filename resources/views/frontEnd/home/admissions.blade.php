@extends('frontEnd.home.layout.front_master')
@section('main_content')
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
			  	
			  	@foreach($early->years as $years)
			    <tr>
			      <th scope="row">{{$years->title}}</th>
			      <td>{{number_format($years->tuition_payment_A)}}</td>
			      <td>{{number_format($years->tuition_payment_B1)}}</td>
			      <td>{{number_format($years->tuition_payment_B2)}}</td>
			      <td>{{number_format($years->tuition_payment_B3)}}</td>
			    </tr>
			    @endforeach
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
			  	
			  	@foreach($early->fees as $fees)
			    <tr >
			      <th scope="row">{{$fees->Name}}</th>
			      <td>{{$fees->description}}</td>
			      <td>{{number_format($fees->price)}}</td>
			      
			    </tr>
			    @endforeach
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
		  	
		  	@foreach($primary->years as $years)
		    <tr>
		       	  <th scope="row">{{$years->title}}</th>
			      <td>{{number_format($years->tuition_payment_A)}}</td>
			      <td>{{number_format($years->tuition_payment_B1)}}</td>
			      <td>{{number_format($years->tuition_payment_B2)}}</td>
			      <td>{{number_format($years->tuition_payment_B3)}}</td>
		    </tr>
		    @endforeach
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
			  	
			  	@foreach($primary->fees as $fees)
			    <tr >
			      <th scope="row">{{$fees->Name}}</th>
			      <td>{{$fees->description}}</td>
			      <td>{{number_format($fees->price)}}</td>
			      
			    </tr>
			    @endforeach
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
		  	
		  	@foreach($middle->years as $years)
		    <tr>
		          <th scope="row">{{$years->title}}</th>
			      <td>{{number_format($years->tuition_payment_A)}}</td>
			      <td>{{number_format($years->tuition_payment_B1)}}</td>
			      <td>{{number_format($years->tuition_payment_B2)}}</td>
			      <td>{{number_format($years->tuition_payment_B3)}}</td>
		    </tr>
		    @endforeach
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
			  	
			  	@foreach($middle->fees as $fees)
			    <tr >
			      <th scope="row">{{$fees->Name}}</th>
			      <td>{{$fees->description}}</td>
			      <td>{{number_format($fees->price)}}</td>
			      
			    </tr>
			    @endforeach
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
		      	@foreach($bus as $bus1)
		      	<th>{{$bus1->title}}</th>
		      	@endforeach		     		      
		    </tr>
		    <tr>
		  		<td scope="col">Price</td>
		  		@foreach($bus as $bus2)
		      	<td>{{number_format($bus2->far)}}/year</td>
		      	@endforeach	
		  	</tr>
		  </thead>
		  
		</table>
		@foreach($notes as $bus_note)
		<p>{{$bus_note->Bus_Fee}}</p>
		@endforeach
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<h4>Loyalty & Sibling Discount</h4>
		@foreach($notes as $loyalty_note)
		<p>{{$loyalty_note->Loyalty_Sibling_Discount}}</p>
		@endforeach

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
		  	@foreach($discount as $discount)
		    <tr >
		      
		        <td>{{$discount->name}}</td>
		        <td>{{$discount->first_year}}</td>
		        <td>{{$discount->second_year}}</td>
		        <td>{{$discount->third_year}}</td>
		        <td>{{$discount->fourth_year}}</td>
		        <td>{{$discount->fifth_and_subsequent_years}}</td>
		      
		      
		    </tr>
		    @endforeach
		  </tbody>
		  
		</table>
		
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<h4>Late Enrolment</h4>
		@foreach($notes as $late_note)
		<p>{{$late_note->Late_Enrolment}}</p>
		@endforeach
		<table class="table table-bordered">
		  <thead>
		   	<tr class="table-active">
		      	<th >Entry Date</th>
		      	@foreach($late_enrolment as $late1)
		      	<th>{{$late1->entry_date}}</th>
		      	@endforeach		     		      
		    </tr>
		    <tr>
		  		<th >% of annual tuition</th>
		  		@foreach($late_enrolment as $late2)
		      	<td>{{$late2->percent_of_annual_tuition}}</td>
		      	@endforeach	
		  	</tr>
		  </thead>
		  
		</table>
		<br>
		<b>Special Educational Needs (SEN)</b><br>
		@foreach($notes as $SEN)
			<p>{{$SEN->Special_Educational_Needs}}</p>
		@endforeach		
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
            @foreach($schoolyears as $key => $value)         
              <th scope="col">{{$value}}</th>
            @endforeach
           
        </tr>
       
      </thead>
      <tbody>
       
          @foreach($list as $key => $value)
            <tr>
              <td>{{$key}}</td>
              @foreach($value as $year)
                @if($year->id_year==null)
                <td>N/A</td>
                
                @else
                <td>{{$year->years->title}}</td>
                @endif
                
               
                
                
              @endforeach
              @if($value->count()==2)
                <td>N/A</td>
              @elseif($value->count()==1)
                <td>N/A</td>
                <td>N/A</td>
                @elseif($value->count()==0)
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
              @endif


            </tr>  
                     
          @endforeach
        
        
      </tbody>    
    </table>
		 <b> Late Payment</b><br>
		@foreach($notes as $late)
			<p>{{$late->Late_Payment}}</p>
		@endforeach		
	</div>
</div>


<br>
<div class="row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<h4>Early Withdrawal</h4>
		@foreach($notes as $withdraw_note)
			<p>{{$withdraw_note->Early_Withdrawal}}</p>
		@endforeach	
		<table class="table table-bordered">
		  <thead>
		   	<tr class="table-info">
		      	<th scope="col">Withdrawal Date</th>
		      	@foreach($withdraw as $withdraw1)
		      	<th>{{$withdraw1->withdraw_date}}</th>
		      	@endforeach		     		      
		    </tr>
		    <tr>
		  		<td scope="col">Rate of refundable</td>
		  		@foreach($withdraw as $withdraw2)
		      	<td>{{$withdraw2->refund_rate}}</td>
		      	@endforeach	
		  	</tr>
		  </thead>
		  
		</table>
		<p>- All fees are quoted in Vietnam Dong.</p>
		<p>- Please note that refunds cannot be made in the event of a force majeure. Force majeure event refers
		to or effect an which can not be reasonably anticipated or be under our control, e.g earthquakes,
		epidemics and other natural disasters.</p>

	</div>

</div>

@endsection

@section('script')
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
@endsection

