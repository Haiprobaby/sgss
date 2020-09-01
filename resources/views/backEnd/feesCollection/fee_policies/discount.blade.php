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
    @foreach($discount as $discount)
      <tr >
        
        <td>{{$discount->name}}</td>
        <td>{{$discount->first_year}}</td>
        <td>{{$discount->second_year}}</td>
        <td>{{$discount->third_year}}</td>
        <td>{{$discount->fourth_year}}</td>
        <td>{{$discount->fifth_and_subsequent_years}}</td>
        <td>
          <a href="#" id="{{$discount->id}}" class="btn btn-primary edit-discount" onclick="edit_discount({{$discount->id}})" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</a>
          <button type="button"  class="btn btn-danger delete-discount" onclick="delete_discount({{$discount->id}})">Del</button>
        </td>
        
      </tr>
    
    @endforeach
  </tbody>
</table>

</div>
</div>
</div>
</div>

@include('backEnd.feesCollection.fee_policies.modals.edit_discount')

@include('backEnd.feesCollection.fee_policies.modals.add_discount')

