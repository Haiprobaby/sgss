@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.item_list')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.inventory')</a>
                <a href="#">@lang('lang.item_list')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        @if(isset($editData))
        @if(in_array(321, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
           
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{url('files')}}" class="primary-btn small fix-gr-bg">
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
                            <h3 class="mb-30">@if(isset($editData))
                                    @lang('lang.edit')
                                @else
                                    @lang('lang.add')
                                @endif
                                @lang('lang.item')
                            </h3>
                        </div>
                        @if(isset($editData))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'files-update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @else
                        @if(in_array(321, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
           
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'files-add',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @endif
                        @endif
                        <input type="hidden" name="id" autocomplete="off" value="{{isset($editData)? $editData->id : '' }}">
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    @if(session()->has('message-success'))
                                    <div class="alert alert-success mb-20">
                                        {{ session()->get('message-success') }}
                                    </div>
                                    @elseif(session()->has('message-danger'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('message-danger') }}
                                    </div>
                                    @endif

                                    <div class="col-lg-12 mb-20">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            type="text" name="name" autocomplete="off" value="{{isset($editData)? $editData->Name : '' }}">
                                            <label>@lang('lang.name') <span>*</span> </label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-20">                               
                            </div>

                            <div class="col">
                                                <div class="row no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="input-effect">
                                                            <input class="primary-input" type="text" id="placeholderFileOneName"
                                                                   placeholder="{{isset($editData)? $editData->url : '' }}"
                                                                   readonly 
                                                            >
                                                            <span class="focus-border"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="primary-btn-small-input" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="document_file_1">@lang('lang.browse')</label>
                                                            <input type="file" class="d-none" name="file_url" id="document_file_1" >
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                             
                  				@php 
                                  $tooltip = "";
                                  if(in_array(321, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{$tooltip}}">

                                            <span class="ti-check"></span>
                                            @if(isset($editData))
                                                @lang('lang.update')
                                            @else
                                                @lang('lang.save')
                                            @endif
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
                    <h3 class="mb-0">@lang('lang.item_list')</h3>
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
                                    <td colspan="6">
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
                            <th>@lang('lang.id')
                            <th>@lang('lang.name') </th>
                            <th>@lang('lang.url') </th>
                            <th>@lang('lang.action')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(isset($files))
                        @foreach($files as $file)
                        <tr>

                            <td>{{$file->id}}</td>
                            <td>{{$file->Name}}</td>
                            <td>{{$file->url}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        @lang('lang.select')
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    @if(in_array(322, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                                        <a class="dropdown-item" href="{{url('files-edit/'.$file->id)}}">@lang('lang.edit')</a>
                                    @endif
                                    @if(in_array(323, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                                        <a class="deleteUrl dropdown-item" data-modal-size="modal-md" title="Delete Item" href="{{url('for-delete-file/'.$file->id)}}">@lang('lang.delete')</a>
                                    @endif
                                    </div>
                                </div>
                            </td>

                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection
