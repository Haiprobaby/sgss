@extends('backEnd.master')
@section('mainContent')
@php  $setting = App\SmGeneralSettings::find(1); if(!empty(@$setting->currency_symbol)){ @$currency = @$setting->currency_symbol; }else{ @$currency = '$'; } @endphp
@php
    function showPicName($data){
        $name = explode('/', $data);
        return $name[3];
    }
@endphp
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.add') @lang('lang.income') </h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.accounts')</a>
                <a href="#">@lang('lang.add') @lang('lang.income')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        @if(isset($add_income))
        @if(in_array(140, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{url('add-income')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('lang.add')
                </a>
            </div>
        </div>
        @endif
        @endif
        <div class="row">
           
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">@if(isset($add_income))
                                    @lang('lang.edit')
                                @else
                                    @lang('lang.add')
                                @endif
                                @lang('lang.income')
                            </h3>
                        </div>
                        @if(isset($add_income))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'add_income_update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'add-income-update']) }}
                        @else
                         @if(in_array(140, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'add_income_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'add-income']) }}
                        @endif
                        @endif
                        <div class="white-box">
                            <div class="add-visitor">
                                @if(isset($add_income))
                                    <input type="hidden"  id="student_id" value="{{$add_income->student_id}}">
                                    <input type="hidden"  id="pay_id" value="{{$add_income->payer}}">
                                    <input type="hidden" name="id" value="{{$add_income->id}}">
                                @else
                                    <input type="hidden"  id="student_id">  
                                    <input type="hidden"  id="pay_id">
                                @endif
                                <div class="row  mt-25 studen_select">
                                    <div class="col-lg-12">

                                        <select id="student_list" class="niceSelect w-100 bb form-control{{ @$errors->has('student_list') ? ' is-invalid' : '' }}" name="student_id">
                                            <option data-display="@lang('student name') *" value="" >@lang('student name') *</option>
                                            @foreach($student_list as $student_list)
                                                @if(isset($add_income))
                                                <option value="{{@$student_list->id}}"
                                                    {{@$add_income->student_id == @$student_list->id? 'selected': ''}}>{{@$student_list->full_name}}</option>
                                                @else
                                                <option value="{{@$student_list->id}}" {{old('student_list') == @$student_list->id? 'selected' : ''}}>{{@$student_list->full_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        
                                        @if (@$errors->has('income_head'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ @$errors->first('income_head') }}</strong>
                                        </span>
                                        @endif 
                                        
                                        <div id="student_info" style="display: none;">
                                        <p>
                                        <a href="" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-plus"></i>
                                        </a>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                          
                                            <span>Father name:<p id="f_name">Đây</p></span>
                                            <span >Mother name :<p id="m_name">Là</p></span>
                                            <span >Guardian name :<p id="g_name">Tên</p></span>
                                          
                                        </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row  mt-25 studen_select">
                                    <div class="col-lg-12">

                                        <select id="payer" class="niceSelect w-100 bb form-control{{ @$errors->has('payer') ? ' is-invalid' : '' }}" name="payer">
                                            <option data-display="@lang('Payer') *" value="" >@lang('Payer') *</option>
                                            @if(isset($add_income))
                                                <option value="1"
                                                    {{@$add_income->payer == '1'? 'selected': ''}}>Father
                                                </option>
                                                <option value="2"
                                                    {{@$add_income->payer == '2'? 'selected': ''}}>Mother
                                                </option>
                                                <option value="3"
                                                    {{@$add_income->payer == '3'? 'selected': ''}}>Guardian
                                                </option>
                                                <option value="4"
                                                    {{@$add_income->payer == '4'? 'selected': ''}}>Other
                                                </option>
                                                @else
                                                    <option data-display="Father" value="1">Father</option>
                                                    <option data-display="Mother" value="2">Mother</option>
                                                    <option data-display="Guardian" value="3">Guardian</option>
                                                    <option data-display="Others" value="4">Other</option>
                                                @endif
                                            
                                        </select>
                                        @if (@$errors->has('payer'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ @$errors->first('payer') }}</strong>
                                        </span>
                                        @endif                                                                                
                                    </div>                                    
                                </div>
                                <div class="row  mt-25" >
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input id="payer_name" class="primary-input form-control{{ @$errors->has('payer_name') ? ' is-invalid' : '' }}"
                                                type="text" name="payer_name" value="{{isset($add_income)? $add_income->payer_name: old('payer_name')}}" maxlength="100" readonly="">
                                            <label>@lang('Payer name') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('payer_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('payer_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                </div>
                              <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ @$errors->has('address') ? ' is-invalid' : '' }}"
                                                type="text" name="address" value="{{isset($add_income)? $add_income->address: old('address')}}" maxlength="100">
                                            <label>@lang('lang.address') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ @$errors->has('receivingfor') ? ' is-invalid' : '' }}"
                                                type="text" name="receivingfor" value="{{isset($add_income)? $add_income->receiving_for: old('receivingfor')}}" maxlength="100">
                                            <label>@lang('receiving for') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('receivingfor'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('receivingfor') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-25">
                                    <div class="col-lg-12">

                                        <select class="niceSelect w-100 bb form-control{{ @$errors->has('income_head') ? ' is-invalid' : '' }}" name="income_head">
                                            <option data-display="@lang('lang.a_c_Head') *" value="">@lang('lang.a_c_Head') *</option>
                                            @foreach($income_heads as $income_head)
                                                @if(isset($add_income))
                                                <option value="{{@$income_head->id}}"
                                                    {{@$add_income->income_head_id == @$income_head->id? 'selected': ''}}>{{@$income_head->head}}</option>
                                                @else
                                                <option value="{{@$income_head->id}}" {{old('income_head') == @$income_head->id? 'selected' : ''}}>{{@$income_head->head}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if (@$errors->has('income_head'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ @$errors->first('income_head') }}</strong>
                                        </span>
                                        @endif 
                                    </div>
                                </div>
                                
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <select class="niceSelect w-100 bb form-control{{ @$errors->has('payment_method') ? ' is-invalid' : '' }}" name="payment_method" id="payment_method">
                                            <option data-display="@lang('lang.payment_method') *" value="">@lang('lang.payment_method') *</option>
                                            @foreach($payment_methods as $payment_method)
                                            @if(isset($add_income))
                                            <option value="{{@$payment_method->id}}"
                                                {{@$add_income->payment_method_id == @$payment_method->id? 'selected': ''}}>{{@$payment_method->method}}</option>
                                            @else
                                            <option value="{{@$payment_method->id}}">{{@$payment_method->method}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @if (@$errors->has('payment_method'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ @$errors->first('payment_method') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>




                                <div class="row mt-25" id="bankAccount">
                                    <div class="col-lg-12">
                                        <select class="niceSelect w-100 bb form-control{{ @$errors->has('accounts') ? ' is-invalid' : '' }}" name="accounts">
                                            <option data-display="@lang('lang.accounts') *" value="">@lang('lang.accounts') *</option>
                                            @foreach($bank_accounts as $bank_account)
                                            @if(isset($add_income))
                                            <option value="{{@$bank_account->id}}"
                                                {{@$add_income->account_id == @$bank_account->id? 'selected': ''}}>{{@$bank_account->account_name}}</option>
                                            @else
                                            <option value="{{@$bank_account->id}}">{{@$bank_account->account_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                         @if ($errors->has('accounts'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ @$errors->first('accounts') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="row no-gutters input-right-icon mt-25">
                                    <div class="col">
                                        <div class="input-effect">
                                            <input class="primary-input date form-control{{ @$errors->has('date') ? ' is-invalid' : '' }}"
                                                id="startDate" type="text" placeholder="@lang('lang.date') *" name="date" value="{{isset($add_income)? date('m/d/Y', strtotime($add_income->date)): date('m/d/Y')}}">
                                            <span class="focus-border"></span>
                                            @if ($errors->has('date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input id="amount" class="primary-input form-control{{ @$errors->has('amount') ? ' is-invalid' : '' }}"
                                                type="number" name="amount" value="{{isset($add_income)? $add_income->amount: old('amount')}}" maxlength="9999999999">
                                            <label>@lang('lang.amount') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('amount') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            
                                            <textarea id="amount_in_words" class="primary-input form-control" cols="0" rows="4" name="amount_in_words">{{isset($add_income)? $add_income->amount_in_words: old('amount_in_words')}}</textarea>
                                            <label>@lang('in words') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('amount_in_words'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('amount_in_words') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                     <div class="col">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="input-effect">
                                                    <input class="primary-input" type="text" id="placeholderFileOneName" placeholder="{{isset($add_income)? ($add_income->file != ""? showPicName($add_income->file):'File'):'file' }}" readonly
                                                        >
                                                    <span class="focus-border"></span>
                                                    @if ($errors->has('file'))
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ @$errors->first('file') }}</strong>
                                                        </span>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="document_file_1">@lang('lang.browse')</label>
                                                    <input type="file" class="d-none" name="file" id="document_file_1">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4" name="description">{{isset($add_income)? $add_income->description: old('description')}}</textarea>
                                            <label>@lang('lang.description') <span></span></label>
                                            <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>
                                @php 
                                  $tooltip = "";
                                  if(in_array(140, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{@$tooltip}}">
                                            <span class="ti-check"></span>
                                            {{!isset($add_income)? "save":"update"}} @lang('lang.income')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">@lang('lang.income') @lang('lang.list')</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                                @if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != "")
                                <tr>
                                    <td colspan="7">
                                        @if(session()->has('message-success-delete'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message-success-delete') }}
                                        </div>
                                        @elseif(session()->has('message-danger-delete'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message-danger-delete') }}
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>@lang('lang.name')</th>
                                    <th>@lang('lang.payment_method')</th>
                                    <th>@lang('lang.date')</th>
                                    <th>@lang('lang.a_c_Head')</th>
                                    <th>@lang('lang.amount')({{$currency}})</th>
                                    <th>@lang('lang.action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($add_incomes as $add_income)
                                <tr>
                                    <td>{{@$add_income->payer_name}}</td>
                                    <td>{{@$add_income->paymentMethod !=""?@$add_income->paymentMethod->method:""}} {{@$add_income->payment_method_id == "3"? '('.@$add_income->account->account_name.')':''}}</td>
                                    <td data-sort="{{strtotime(@$add_income->date)}}" >
                                        {{@$add_income->date != ""? App\SmGeneralSettings::DateConvater(@$add_income->date):''}}

                                        
                                    </td>
                                    <td>{{isset($add_income->ACHead->head)? $add_income->ACHead->head: ''}}</td>
                                    <td>{{number_format(@$add_income->amount)}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('lang.select')
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @if(in_array(141, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                                <a class="dropdown-item" href="{{route('income_print', [@$add_income->id])}}">@lang('lang.print')</a>
                                                @endif
                                                @if(in_array(26, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)

                                                    <a id="{{$add_income->id}}" class="dropdown-item modalLink" title="Income Details"
                                                       data-modal-size="large-modal"
                                                       href="{{url('income', [@$add_income->id])}}" >@lang('lang.view')</a>
                                                @endif

                                                @if(in_array(141, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                                <a class="dropdown-item" href="{{route('add_income_edit', [@$add_income->id])}}">@lang('lang.edit')</a>
                                               @endif
                                               @if(in_array(142, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                                <a class="dropdown-item deleteAddIncomeModal" href="#" data-toggle="modal" data-target="#deleteAddIncomeModal" data-id="{{@$add_income->id}}">@lang('lang.delete')</a>
                                           @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="modal fade admin-query" id="deleteAddIncomeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('lang.delete') @lang('lang.income')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4>@lang('lang.are_you_sure_to_delete')</h4>
                </div>

                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                     {{ Form::open(['route' => 'add_income_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                     <input type="hidden" name="id" value="" id="ncome_id">
                    <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')</button>
                     {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
     var DOCSO=function(){var t=["không","một","hai","ba","bốn","năm","sáu","bảy","tám","chín"],r=function(r,n){var o="",a=Math.floor(r/10),e=r%10;return a>1?(o=" "+t[a]+" mươi",1==e&&(o+=" mốt")):1==a?(o=" mười",1==e&&(o+=" một")):n&&e>0&&(o=" lẻ"),5==e&&a>=1?o+=" lăm":4==e&&a>=1?o+=" tư":(e>1||1==e&&0==a)&&(o+=" "+t[e]),o},n=function(n,o){var a="",e=Math.floor(n/100),n=n%100;return o||e>0?(a=" "+t[e]+" trăm",a+=r(n,!0)):a=r(n,!1),a},o=function(t,r){var o="",a=Math.floor(t/1e6),t=t%1e6;a>0&&(o=n(a,r)+" triệu",r=!0);var e=Math.floor(t/1e3),t=t%1e3;return e>0&&(o+=n(e,r)+" ngàn",r=!0),t>0&&(o+=n(t,r)),o};return{doc:function(r){if(0==r)return t[0];var n="",a="";do ty=r%1e9,r=Math.floor(r/1e9),n=r>0?o(ty,!0)+a+n:o(ty,!1)+a+n,a=" tỷ";while(r>0);return n.trim()}}}();
</script>
<script type="text/javascript">
    $('#amount').keyup(function(){
        var value = $(this).val();
        
        $('#amount_in_words').text(DOCSO.doc(value)+" đồng");
    });
</script>
<script type="text/javascript">
    $('#student_list').change(function()
    {
        var id_pay=$('#pay_id').val();
        var id = $(this).val();
        $('#student_id').val(id);
        if(id==='')
        {
            $('#student_info').css('display','none');
            return false;
        }
        if(id!='' && id_pay!= '')
        {
            $.get('/get-student-info/'+id,function(data){
                $('#student_info').css('display','block');
                $('#f_name').text(data.fathers_name);
                $('#m_name').text(data.mothers_name);
                $('#g_name').text(data.guardians_name);
            });   
            $.get('/get-payer-name/'+id+'/'+id_pay,function(data){
                $('#payer_name').val(data);
                $('#payer_name').attr('readonly','');   
            });
        }
        else
        {
        $.get('/get-student-info/'+id,function(data){
                $('#student_info').css('display','block');
                $('#f_name').text(data.fathers_name);
                $('#m_name').text(data.mothers_name);
                $('#g_name').text(data.guardians_name);
            });   
        }


    });

        $('#payer').change(function(){
            var id_pay = $(this).val();
            $('#pay_id').val(id_pay);
            var id = $('#student_id').val();
            if (id_pay=='4') 
            {
                $('#payer_name').attr('readonly',false);
            }
            else
            {
                $('#payer_name').attr('readonly',true);
            }
            if(id_pay==''||id=='')
            {
                $('#payer_name').val('');
                return false;
            }
            $.get('/get-payer-name/'+id+'/'+id_pay,function(data){
                $('#payer_name').val(data)
                
            });
            
        });

    
</script>

@endsection