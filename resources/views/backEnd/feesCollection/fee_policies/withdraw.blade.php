
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
        @foreach($withdraw as $withdraw2)
        <tr>
            <td>{{$withdraw2->withdraw_date}}</td>
            <td>{{$withdraw2->refund_rate}}</td>
            <td>
          
          <a href="#" id="{{$withdraw2->id}}" class="btn btn-primary edit_withdraw"  data-toggle="modal" data-target="#edit_withdraw" data-whatever="@mdo">Edit</a>
        </td>
            @endforeach 
        </tr>
      </tbody>
      
    </table>
</div>
</div>
</div>
</div>

@include('backEnd.feesCollection.fee_policies.modals.edit_withdraw')
