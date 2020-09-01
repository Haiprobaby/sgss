<?php
    $date = getdate();
?>

<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
    @media  print {
        #print{
            display: none;

        }
        footer {
            display: none;
        }
    }
    .section {
        background-color: white;
        padding: 50px;
    }
    .big{
        font-size: 15px;
    }
    td{
        width: 65%;
        border-bottom: 1px dashed black;

    }

</style>

<div class="section" >
<div class="row" id="detail" >
    <div class="col-md-4">
        <div class="row">
            <div class="col-sm-2">
                <img width="50px" height="50px" src="../public/sg_star_logo.png">
            </div>
            <div class="col-sm-8">
                <b>SAIGON STAR<br>INTERNATIONAL SCHOOL</b><br>
            </div>
        </div>
     <b>CÔNG TY TNHH QUỐC TẾ NGÔI SAO SÀI GÒN</b><br>
        Địa chỉ:Khu dân cư số 5,P.Thạnh Mỹ Lợi,Quận 2,TP.HCM<br>
        Mã số thuế <i>(Tax code)</i>:030 414 5046<br>
        Điện thoại<i>(Tel)</i>: (08) 3742 7827 - 3742 3222 <br>
        Fax:(08) 3742 5436
    </div>
    <div class="col-md-4">
        <br><br><br><br><br><br>
        <h1 style="text-align: center;"><b>PHIẾU THU</b></h1>
        <h3 style="text-align: center; font-style: italic;"><b>REVENUE</b></h3>
        <div class="row" style="text-align: center;">
            <div class="col-sm-4">Ngày : <?php echo e($date['mday']); ?> <br>(day</div>
            <div class="col-sm-4">Tháng  : <?php echo e($date['mon']); ?><br>month</div>
            <div class="col-sm-4">Năm : <?php echo e($date['year']); ?><br>year)</div>
            
        </div>
    </div>
    <div class="col-md-4">
        <div style="text-align: center;">
            Mẫu số : <b>02-TT</b><br>
            Ban hành theo QĐ 1141-TC-QĐ-CĐKT<br>
            Ngày 01-11-1995 của Bộ Tài Chính<br>
            <p>Số (no) : <b><?php echo e(sprintf('%06d', $income->id)); ?></b></p>
            <p>Quyển số (book) :............. </p>
            <p>Nợ (Debit) :.............</p>
            <p>Có (Credit) :.............</p>
        </div>
    </div>
</div>
<br><br>


<table>
    <tr>
    <th>Người nộp tiền (Payer) :</th>
    <td><?php echo e($income->payer_name); ?></td>   
    </tr>
    <tr>
    <th>Tên học sinh (Student) :</th>
    <td><?php echo e($student_name); ?></td>   
    </tr>
    <tr>
    <th>Địa chỉ (address) :</th>
    <td><?php echo e($income->address); ?></td>    
    </tr>
    <tr>
    <th>Lý do thu (Receiving for) :</th>
    <td><?php echo e($income->receiving_for); ?></td>    
    </tr>
    <tr>
    <th>Số tiền bằng số (Amount in number) :</th>
    <td><?php echo e(number_format($income->amount)); ?></td>    
    </tr>
    <tr>
    <th>Số tiền bằng chữ (Amount in words) :</th>
    <td><?php echo e($income->amount_in_words); ?></td>
    </tr>
    <tr>
    <th>Kèm theo chứng từ gốc (Enclosed document) :</th>
    <td><?php echo e($income->description); ?></td>
    </tr>
</table>
<br><br><br>
<div class="row">
    <div class="col-md-4 ">
        <div style="text-align: center;">
        <b class="big">Người nộp tiền (Payer)</b><br>
        Ký,Ghi rõ họ tên <i>(Sign,fullname)</i>
        </div>
    </div>
    <div class="col-md-4 ">
        <div style="text-align: center;">
        <b class="big">Kế toán (Account)</b><br>
        Ký,Ghi rõ họ tên <i>(Sign,fullname)</i><br>
        <h4><?php echo e($income->ACHead->head); ?></h4>
        </div>
    </div>
    <div class="col-md-4 ">
        <div style="text-align: center;">
        <b class="big">Tổng giám đốc (General Director)</b><br>
        Ký,đóng dấu,Ghi rõ họ tên <i>(Sign,Stamp,fullname)</i>
        </div>
    </div>
</div>
<button id="print" class="btn btn-primary" onClick="window.print();">print</button>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/accounts/printIncome.blade.php ENDPATH**/ ?>