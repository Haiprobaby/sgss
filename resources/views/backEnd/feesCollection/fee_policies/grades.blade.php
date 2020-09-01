
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
            @foreach($schoolyears as $key => $value)         
              <th scope="col">{{$value}}</th>
            @endforeach
            <th>Option</th>
        </tr>
       
      </thead>
      <tbody>
          
          @foreach($list as $key => $value)

            <tr>
              <td>{{$key}}</td>
              @foreach($value as $year)
                @if($year==null||$year->id_year==null)
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
                
                <td>
                  <a href="/delete-grade/{{$id[$i++]}}" onclick="return confirm('are you sure?')"  class="btn btn-danger ">Xóa</a>
                </td>               
            </tr>                      
          @endforeach   
          
      </tbody>    
    </table>
   
</div> 
</div>
</div>
</div>
@include('backEnd.feesCollection.fee_policies.modals.add_grade')