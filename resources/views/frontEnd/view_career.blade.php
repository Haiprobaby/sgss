@extends('frontEnd.home.layout.front_master')
@section('main_content')
<style type="text/css">
    
    p{
        color: black;
    }
    .right-col{
        margin : 20px;

    }
    .left-col{
        background-color: #E9ECEB;
        margin-top: 20px
        
    }    
    
</style>

<div class="container">
	
		<h1>{{$career->name}}</h1>

        <div class="row">
            <div class="col-lg-9 left-col ">                    
                    	
					<br>
					{!!$career->description!!}
                
            </div>
            
            <div class="col-lg-3 sub_content">
             
                <div class="right-col">
                	
                    <a href="#" title="View Details" data-toggle="modal" data-target="#job_apply" data-whatever="@mdo">
                    <div>
                        <div class="ItemImage">
                        <img class="card-img" src="https://2.bp.blogspot.com/-YE3MJa5l1hg/V0GK8bkPNYI/AAAAAAAAAU8/MeX2uuOWGeMXtYTQMkfDufWYIyd7_OOIwCLcB/s1600/Job-Offer-350x287.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">Apply for our job opportunities ?</h2>
                            <p class="card-text">Want to join us? click here!</p>
                            <div class="row">                                
                            </div>
                        </div>
                    </div>
                    </a>
                </div>         
            </div>              
        </div>		
</div>
@include('frontEnd.modals_form.job_apply')
@endsection
@section('script')
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection
