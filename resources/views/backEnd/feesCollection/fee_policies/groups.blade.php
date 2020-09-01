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
    @foreach($groups as $group)
    
    <tr>
      <th scope="row">{{$group->id}}</th>
      <td>{{$group->Name}}</td>
      <td>{{$group->description}}</td>
      <td>
        <a href="edit-fees/{{$group->id}}" class="btn btn-success">Edit</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>