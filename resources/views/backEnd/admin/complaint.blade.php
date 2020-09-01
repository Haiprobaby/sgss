@extends('backEnd.master')
@section('mainContent')
    @php
        function showPicName($data){
            $name = explode('/', $data);
            return $name[3];
        }
    @endphp
    <section class="sms-breadcrumb mb-40 white-box up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>@lang('lang.manage') @lang('lang.complaint')</h1>
                <div class="bc-pages">
                    <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                    <a href="#">@lang('lang.admin_section')</a>
                    <a href="#">@lang('lang.complaint')</a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            @if(isset($complaint))
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="{{url('complaint')}}" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            @lang('lang.add')
                        </a>
                    </div>
                </div>
            @endif
            
                
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">@lang('lang.complaint') @lang('lang.list')</h3>
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
                                    <th>@lang('lang.complaint') @lang('lang.by')</th>
                                    <th>@lang('lang.complaint') @lang('lang.type')</th>
                                    <th>@lang('lang.email')</th>
                                    <th>@lang('lang.description')</th>
                                    <th>@lang('lang.phone')</th>
                                    <th>@lang('lang.date')</th>
                                    <th>@lang('lang.status')</th>
                                    <th>@lang('lang.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(@$complaints as $complaint)
                                    <tr @if($complaint->read==0)style="background-color: #F9E9E5;"@endif>
                                        <td>{{@$complaint->complaint_by}}</td>
                                        <td>{{isset($complaint->complaint_type)? @$complaint->complaint_type:''}}</td>
                                        <td>{{ isset($complaint->email)? @$complaint->email:''}}</td>
                                        <td>{{ isset($complaint->description)? @$complaint->description:''}}</td>
                                        <td>{{$complaint->phone}}</td>

                                        <td data-sort="{{strtotime(@$complaint->date)}}">{{ !empty(@$complaint->date)? App\SmGeneralSettings::DateConvater(@$complaint->date):''}}
                                         </td>
                                         <td>@if($complaint->read==1) Read @else Unread @endif   </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    @lang('lang.select')
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @if(in_array(26, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)

                                                    <a id="{{$complaint->id}}" class="dropdown-item modalLink" title="Complaint Details"
                                                       data-modal-size="large-modal"
                                                       href="{{url('complaint', [@$complaint->id])}}" onclick="markasread({{$complaint->id}})">@lang('lang.view')</a>
                                                    @endif
                                                    
                                                   @if(in_array(24, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)

                                                       <a class="dropdown-item" data-toggle="modal"
                                                       data-target="#deleteComplaintModal{{$complaint->id}}"
                                                       href="#">@lang('lang.delete')</a>
                                                    @endif
                                                       @if(@$complaint->file != "")
                                                     @if(in_array(25, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)
                                                   @if (@file_exists($complaint->file))
                                                        <a class="dropdown-item"
                                                            href="{{url('download-complaint-document/'.showPicName(@$complaint->file))}}">
                                                                @lang('lang.download') <span class="pl ti-download"></span>
                                                        </a>
                                                    @endif    
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteComplaintModal{{@$complaint->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">@lang('lang.delete') @lang('lang.complaint')</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4>@lang('lang.are_you_sure_to_delete')</h4>
                                                    </div>
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal">@lang('lang.cancel')
                                                        </button>
                                                        {{ Form::open(['url' => 'complaint/'.$complaint->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
                                                        <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')
                                                        </button>
                                                        {{ Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        function markasread(id)
            {
                $('#'+id).closest('tr').css('background-color','white');
                $('#'+id).closest('tr').find("td:eq(6)").text('Read');
                
            }
    </script>
@endsection