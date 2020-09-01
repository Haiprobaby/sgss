@extends('backEnd.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/')}}/css/croppie.css">
@endsection
@section('mainContent')
<style type="text/css">
  table th,td {
   text-align: center; 
   background-color: #fff;
   font-size: 15px;
}

.table {
   margin: auto;
   width: 100% !important; 

}
}
</style>

<button class="btn btn-primary" id="btn-groups" type="button" data-toggle="collapse" data-target="#group_collapse" aria-expanded="false" aria-controls="multiCollapseExample2">Groups</button>

<button class="btn btn-primary" id="btn-late" type="button" data-toggle="collapse" data-target="#late_enrol_collapse" aria-expanded="false" aria-controls="multiCollapseExample2">LateEnrol</button>

<button class="btn btn-primary" id="btn-discount" type="button" data-toggle="collapse" data-target="#discount_collapse" aria-expanded="false" aria-controls="multiCollapseExample2">Discount</button>

<button class="btn btn-primary" id="btn-grades" type="button" data-toggle="collapse" data-target="#grades_collapse" aria-expanded="false" aria-controls="multiCollapseExample2">Grades</button>

<button class="btn btn-primary" id="btn-withdraw" type="button" data-toggle="collapse" data-target="#withdraw_collapse" aria-expanded="false" aria-controls="multiCollapseExample2">Withdraw</button>
<!-- lấy table fees -->
@include('backEnd.feesCollection.fee_policies.groups')

<!-- lấy table discount -->
@include('backEnd.feesCollection.fee_policies.discount')

<!-- lấy table late_ẻnolment -->
@include('backEnd.feesCollection.fee_policies.late_enrol')

<!-- lấy table grades -->
@include('backEnd.feesCollection.fee_policies.grades')

<!-- lấy table withdraw -->
@include('backEnd.feesCollection.fee_policies.withdraw')
    


  
@endsection
@section('script')
<!-- Pham Trong Hai -->
<!-- Xử lý ẩn các table và hiển thị tương ứng khi click vào từng button-->
<script type="text/javascript">

  $(document).ready(function() {
    $('#group_collapse').collapse('show');

    $('#btn-late').click(function(){
        $('.multi-collapse').collapse('hide');
        $('#late_enrol_collapse').collapse('show');
    });
    $('#btn-groups').click(function(){
        $('.multi-collapse').collapse('hide');
        $('#group_collapse').collapse('show');
    });
    $('#btn-discount').click(function(){
        $('.multi-collapse').collapse('hide');
        $('#discount_collapse').collapse('show');
    });
    $('#btn-withdraw').click(function(){
        $('.multi-collapse').collapse('hide');
        $('#withdraw_collapse').collapse('show');
    });

    $('#btn-grades').click(function(){
        $('.multi-collapse').collapse('hide');
        $('#grades_collapse').collapse('show');
    });
    
    

  });
  
</script>
<!-- Xử lý ẩn các table và hiển thị tương ứng khi click vào từng button-->
<!-- Pham Trong Hai -->
<!-- Pham Trong Hai -->
<!-- Script Sửa một discount gán dữ liệu cho input-->
<script type="text/javascript">
  function edit_discount(id)
  {
  
    $('#id_discount').val(id);
    
    var currentRow=$('#'+id).closest("tr");
    
    $('#discount_for').val(currentRow.find("td:eq(0)").text());
    $('#1styear').val(currentRow.find("td:eq(1)").text());
    $('#2ndyear').val(currentRow.find("td:eq(2)").text());
    $('#3rdyear').val(currentRow.find("td:eq(3)").text());
    $('#4thyear').val(currentRow.find("td:eq(4)").text());
    $('#5thyear').val(currentRow.find("td:eq(5)").text());
   
    
  
}
</script>
<!-- Script Sửa một discount gán dữ liệu cho input-->
<!-- Pham Trong Hai -->
<!-- Script Sửa một discount -->
<script type="text/javascript">
  $('#edit_discount').click(function(e){
      e.preventDefault();
      var id_discount = $('#id_discount').val();
      var discount_for = $('#discount_for').val();
      var first_year = $('#1styear').val();
      var second_year = $('#2ndyear').val();
      var third_year = $('#3rdyear').val();
      var fourth_year = $('#4thyear').val();
      var fifth_year = $('#5thyear').val();
     
      $.ajax({
                url: 'edit-discount',
                type: 'POST',
                dataType: 'html',
                data: {
                    id_discount   : id_discount,
                    discount_for  : discount_for,
                    first_year    : first_year,
                    second_year   : second_year,
                    third_year    : third_year,
                    fourth_year   : fourth_year,
                    fifth_year    : fifth_year
                }
            }).done(function(data) {
                var currentRow = $('#'+id_discount).closest('tr');
                currentRow.find("td:eq(0)").text(discount_for);
                currentRow.find("td:eq(1)").text(first_year);
                currentRow.find("td:eq(2)").text(second_year);
                currentRow.find("td:eq(3)").text(third_year);
                currentRow.find("td:eq(4)").text(fourth_year);
                currentRow.find("td:eq(5)").text(fifth_year);
                $('.close').click();
                $('.toast').toast('show');

            });
  });
</script>
<!-- Script Sửa một discount -->
<!-- Script thêm mới discount -->
<script type="text/javascript">
  $('#add_discount').click(function(e){
      e.preventDefault();
      
      var discount_for = $('#discount_for_add').val();
      var first_year = $('#1styear_add').val();
      var second_year = $('#2ndyear_add').val();
      var third_year = $('#3rdyear_add').val();
      var fourth_year = $('#4thyear_add').val();
      var fifth_year = $('#5thyear_add').val();
       
      $.ajax({
                url: 'add-discount',
                type: 'POST',
                dataType: 'html',
                data: {
                       
                    discount_for  : discount_for,
                    first_year    : first_year,
                    second_year   : second_year,
                    third_year    : third_year,
                    fourth_year   : fourth_year,
                    fifth_year    : fifth_year
                }
            }).done(function(data) {
                $('#discount_table').append('<tr><td>'+(discount_for)+'</td><td>'+(first_year)+'</td><td>'+(second_year)+'</td><td>'+(third_year)+'</td><td>'+(fourth_year)+'</td><td>'+(fifth_year)+'</td><td><a href="edit-discount/'+(data)+'" id="'+(data)+'" class="btn btn-primary edit-discount" onclick="edit_discount('+(data)+')" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</a> <button type="button"  class="btn btn-danger delete-discount" onclick="delete_discount('+(data)+')" >Del</button></td></tr>');
                $('input').val('');
                $('.close').click();
                
            });
  });
</script>

<!-- Script thêm mới discount -->

<!-- Script xóa một discount -->
<script type="text/javascript">
  function delete_discount(data){
    var r=confirm("Do you really want to delete this row??");
    if (r==true)
      {
          var id = parseInt(data);
          var parent = $('#'+id).closest('tr');
          
          $.get("delete-discount/"+id,function(data){
                    parent.slideUp(300,function() {
                    parent.remove();
                  });
                  
                });
      }
    else
      {
          return false;
      }
 }
</script>
<!-- Script xóa một discount -->

<!-- Script edit late_enrol -->
<script type="text/javascript">
      var row=null;
  $('.edit_enrol').click(function(){
      var currentRow=$(this).closest('tr');
      row=currentRow;
      $('#id_late').val($(this).attr('id'));
      $('#term').val(currentRow.find("td:eq(0)").text());
      $('#rate').val(currentRow.find("td:eq(1)").text());
    });

    $('#edit_late_enrol').click(function(e){
          e.preventDefault();
          var id_late = $('#id_late').val();
          var term = $('#term').val();
          var rate = $('#rate').val();
          
          $.ajax({
                  url: 'edit-enrol',
                  type: 'POST',
                  dataType: 'html',
                  data: {
                         
                      id_late  : id_late,
                      term    : term,
                      rate   : rate
                      
                  }
              }).done(function(data) {
                   
                    row.find("td:eq(0)").text(term);
                    row.find("td:eq(1)").text(rate);
                    $('.close').click();
              });
    });
</script>
<!-- Script edit late_enrol -->

<!-- Script edit withdraw -->
<script type="text/javascript">
  var row=null;
    $('.edit_withdraw').click(function(){
      var currentRow=$(this).closest('tr');
      row=currentRow;
      $('#id_withdraw').val($(this).attr('id'));
      $('#date_withdraw').val(currentRow.find("td:eq(0)").text());
      $('#rate_withdraw').val(currentRow.find("td:eq(1)").text());
    });

    $('.withdraw_edit').click(function(){
      
      var id_withdraw = $('#id_withdraw').val();
      var date_withdraw = $('#date_withdraw').val();
      var rate_withdraw = $('#rate_withdraw').val();


      $.ajax({
                  url: 'edit-withdraw',
                  type: 'POST',
                  dataType: 'html',
                  data: {
                         
                      id_withdraw  : id_withdraw,
                      date_withdraw    : date_withdraw,
                      rate_withdraw   : rate_withdraw
                      
                  }
              }).done(function(data) {
                   
                    row.find("td:eq(0)").text(date_withdraw);
                    row.find("td:eq(1)").text(rate_withdraw);
                    $('.close').click();
              });
    });
</script>
<!-- Script edit withdraw -->
<script src="{{asset('public/backEnd/')}}/js/croppie.js"></script>
<script src="{{asset('public/backEnd/')}}/js/editStaff.js"></script>
@endsection

