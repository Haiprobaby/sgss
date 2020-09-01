<script src="{{asset('public/backEnd/')}}/js/main.js"></script>
<?php
    $date = getdate();
?>
<div class="row" id="detail" >
    <div class="col-md-4">
        <img width="50px" height="50px" src="https://scontent.fvca1-1.fna.fbcdn.net/v/t1.0-9/40764157_2251966835047931_2393399211782569984_n.png?_nc_cat=1&_nc_sid=09cbfe&_nc_ohc=Q1edohGXS-gAX_gcNFh&_nc_ht=scontent.fvca1-1.fna&oh=611b4a52387bd8ec8c2aff626c149216&oe=5F379CC9">
        <b>SAIGON STAR<br>INTERNATIONAL SCHOOL</b><br>

        <b>CÔNG TY TNHH QUỐC TẾ NGÔI SAO SÀI GÒN</b><br>
        Địa chỉ:Khu dân cư số 5,P.Thạnh Mỹ Lợi,Quận 2,TP.HCM<br>
        Mã số thuế <i>(Tax code)</i>:030 414 5046<br>
        Điện thoại<i>(Tel)</i>: (08) 3742 7827 - 3742 3222 <br>
        Fax:(08) 3742 5436
    </div>
    <div class="col-md-4">
        <br><br><br><br>
        <h1 style="text-align: center;">PHIẾU THU</h1>
        <h3 style="text-align: center;">REVENUE</h3>
        <div class="row" style="text-align: center;">
            <div class="col-sm-4">Ngày : {{$date['mday']}} <br>(day</div>
            <div class="col-sm-4">Tháng  : {{$date['mon']}}<br>month</div>
            <div class="col-sm-4">Năm : {{$date['year']}}<br>year)</div>
            
        </div>
    </div>
    <div class="col-md-4">
        <div style="text-align: center;">
            Mẫu số : <b>02-TT</b><br>
            Ban hành theo QĐ 1141-TC-QĐ-CĐKT<br>
            Ngày 01-11-1995 của Bộ Tài Chính<br>
            <p>Số (no) : {{$income->id}}</p>
            <p>Quyển số (book) : </p>
            <p>Nợ (Debit) : </p>
            <p>Có (Credit) :</p>
        </div>
    </div>
</div>
<br><br><br>
<div class="row">
    <div class="col-md-4">
    <p>Người nộp tiền (Payer) : </p> 
    <p>Địa chỉ (address) : </p>
    <p>Lý do thu (Receiving for) : </p> <br>
    <p>Số tiền bằng số (Amount in number) : </p>
    <p>Số tiền bằng chữ (Amount in words) : </p> <br>
    <p>Kèm theo chứng từ gốc (Enclosed document) : </p>
</div>
<div class="col-md-7">
    <div style="text-align: center; font-size: 15px"><p><b>{{$income->name}}</b> </p></div>
    <div style="text-align: center; font-size: 15px"><p><b>{{$income->address}}</b></p></div>
    <div style="text-align: center; font-size: 15px"><p><b>{{$income->receiving_for}}</b></p><br></div>
    <div style="text-align: center; font-size: 15px"><p><b>{{number_format($income->amount)}} đồng</b></p></div>
    <div style="text-align: center; font-size: 15px"><p><b>{{$income->amount_in_words}}</b></p><br></div>
    <div style="text-align: center; font-size: 15px"><p><b>{{$income->description}}</b></p></div>
</div>
    
</div>
<div class="row">
    <div class="col-md-4">
        <div style="text-align: center;">
        <b >Người nộp tiền (Payer)</b><br>
        Ký,Ghi rõ họ tên <i>(Sign,fullname)</i>
        </div>
    </div>
    <div class="col-md-4">
        <div style="text-align: center;">
        <b >Kế toán (Account)</b><br>
        Ký,Ghi rõ họ tên <i>(Sign,fullname)</i>
        </div>
    </div>
    <div class="col-md-4">
        <div style="text-align: center;">
        <b >Tổng giám đốc (General Director)</b><br>
        Ký,đóng dấu,Ghi rõ họ tên <i>(Sign,Stamp,fullname)</i>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    

   $('#table_id, .school-table-data').DataTable({
        bLengthChange: false,
        language: {
            search: "<i class='ti-search'></i>",
            searchPlaceholder: 'Quick Search',
            paginate: {
                next: "<i class='ti-arrow-right'></i>",
                previous: "<i class='ti-arrow-left'></i>"
            }
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print'
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-columns"></i>',
                postfixButtons: [ 'colvisRestore' ]
            }
        ],
        columnDefs: [
            {
                visible: false
            }
        ],
        responsive: true,
        bDestroy: true
    });

</script>
    