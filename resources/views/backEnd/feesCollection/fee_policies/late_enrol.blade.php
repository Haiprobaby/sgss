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
    @foreach($late as $late)
      <tr>
        
        <td>{{$late->entry_date}}</td>
        <td>{{$late->percent_of_annual_tuition}}</td>
        
        <td>
          
          <a href="#" id="{{$late->id}}" class="btn btn-primary edit_enrol"  data-toggle="modal" data-target="#late_enrol" data-whatever="@mdo">Edit</a>
        </td>
        
      </tr>
    
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>

@include('backEnd.feesCollection.fee_policies.modals.edit_late_enrol')