@extends('backEnd.master')
@section('mainContent')

@php  $setting = App\SmGeneralSettings::find(1); if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; } @endphp

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('careers')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('humanResource')</a>
                <a href="{{url('careers-list')}}">@lang('careers')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
	<div class="container-fluid p-0">
		@if(isset($career))
        @if(in_array(132, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                       
        <div class="row">
            
        </div>
        @endif
        @endif
		<div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                                @if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != "")
                                <tr>
                                    <td colspan="5">
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
                                    <th> @lang('lang.name')</th>
                                    
                                    <th> @lang('lang.status') 	</th>
                                    <th>@lang('salary') ({{$currency}})</th>
                                    <th>@lang('lang.action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($careers as $careers)
                                <tr>
                                    <td data-toggle="tooltip" data-placement="top" title="{{ $careers->description }}">{{$careers->name}}</td>
                                    
                                    <td>@if($careers->status==1)Published @else Unpublish @endif</td>
                                    <td>{{$careers->salary}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('lang.select')
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                
                                                @if(in_array(133, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                                <a class="dropdown-item" href="{{route('career_edit', [$careers->id])}}">@lang('lang.edit')</a>
                                                @endif
                                                @if(in_array(134, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteFeesDiscountModal{{$careers->id}}"
                                                    href="#">@lang('lang.delete')</a>
                                           @endif
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade admin-query" id="deleteFeesDiscountModal{{$careers->id}}" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@lang('lang.delete') @lang('career')</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4>@lang('lang.are_you_sure_to_delete')</h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                                                    <a href="{{route('career_delete', [$careers->id])}}"><button class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')</button></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div></div></section>

<section>
<div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">@if(isset($career))
                                    @lang('lang.edit')
                                @else
                                    @lang('lang.add')
                                @endif
                                @lang('career')
                            </h3>
                        </div>
                        @if(isset($career))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' =>
                        'career_update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @else
                         @if(in_array(132, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'career_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @endif
                        @endif
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        @if(session()->has('message-success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message-success') }}
                                        </div>
                                        @elseif(session()->has('message-danger'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message-danger') }}
                                        </div>
                                        @endif
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                type="text" name="name" autocomplete="off" value="{{isset($career)? $career->name: ''}}">
                                            <input type="hidden" name="id" value="{{isset($career)? $career->id: ''}}">
                                            <label>@lang('lang.name') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">	
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                                                type="text" name="location" autocomplete="off"
                                                value="{{isset($career)? $career->location: ''}}">
                                            <label>@lang('lang.location') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('location'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}"
                                                type="text" name="salary" autocomplete="off"
                                                value="{{isset($career)? $career->salary: ''}}">
                                            <label>@lang('salary') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('salary'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('salary') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 d-flex">
                                        
                                        <p class="text-uppercase fw-500">@lang('lang.status')</p>
                                        <div class="radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="status" id="Published" value="1" class="common-radio relationButton" {{isset($career)? ($career->status == 1? 'checked':''):'checked'}}>
                                                <label for="Published">@lang('Published')</label><br>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="status" id="Unpublish" value="0" class="common-radio relationButton" {{isset($career)? ($career->status == 0? 'checked':''):''}}>
                                                <label for="Unpublish">@lang('Unpublish')</label>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>

                                 <div class="row mt-25">
                                    <div class="col-lg-12">
                                    	<label>@lang('DESCRIPTION') <span></span></label>
                                        <div class="input-effect">
                                            <textarea id="summernote"  cols="" rows="4"
                                                name="description">{{isset($career)? $career->description: ''}}</textarea>
                                                
                                            <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>
                                
                            	@php 
                                  $tooltip = "";
                                  if(in_array(132, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{$tooltip}}">
                                            <span class="ti-check"></span>
                                            @if(isset($fees_discount))
                                                @lang('lang.update')
                                            @else
                                                @lang('lang.save')
                                            @endif
                                            @lang('career')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
	$('#summernote').summernote({

       toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['fontname', ['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']],
    ['height', ['height']]
],
});
</script>
@endsection
    