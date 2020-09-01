@extends('backEnd.master')
@section('mainContent')

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>@lang('lang.news') @lang('lang.category')</h1>
                <div class="bc-pages">
                    <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                    <a href="#">@lang('lang.news')</a>
                    <a href="{{url('news-sub-category')}}">@lang('Sub') @lang('lang.category')</a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            @if(isset($editData))
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="{{url('news-sub-category')}}" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            @lang('lang.add')
                        </a>
                    </div>
                </div>
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
                                    @lang('sub category')
                                </h3>
                            </div>
                            @if(isset($editData))
                                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update_Sub_category',
                            'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'add-income-update']) }}
                            @else
                                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'store_Sub_category',
                                'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'add-income']) }}
                            @endif

                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                       

                                        <div class="col-lg-12 mb-20">
                                            <div class="input-effect">
                                                <input class="primary-input form-control{{ $errors->has('sub_category_name') ? ' is-invalid' : '' }}"
                                                       type="text" name="sub_category_name" autocomplete="off" value="{{isset($editData)? $editData->sub_category_name : '' }}">
                                                <input type="hidden" name="id" value="{{isset($editData)? $editData->id: ''}}">
                                                <label>@lang('lang.category') @lang('lang.name') <span>*</span> </label>
                                                <span class="focus-border"></span>
                                                @if ($errors->has('category_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('category_name') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-20">

                                                <select
                                                    class="niceSelect w-100 bb form-control{{ $errors->has('accounts') ? ' is-invalid' : '' }}"
                                                    name="category_id">
                                                    <option data-display="@lang('lang.select') *" value="">@lang('lang.select') *</option>
                                                    @foreach($newsCategories as $value)
                                                    <option data-display="{{$value->category_name}}" value="{{$value->id}}"
                                                        @if(isset($editData))
                                                            @if($editData->category_id == $value->id)
                                                                selected
                                                            @endif
                                                        @endif>
                                                        {{$value->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('accounts'))
                                                    <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ $errors->first('accounts') }}</strong>
                                        </span>
                                                @endif
                                        </div>
                                        <div class="col-lg-12 mb-20">
                                                <div class="input-effect">
                                                    <textarea class="primary-input form-control" cols="0" rows="4" name="description">{{isset($editData)? $editData->description: old('description')}}</textarea>
                                                    <label>@lang('lang.description') <span></span></label>
                                                    <span class="focus-border textarea"></span>
                                                </div>
                                            </div>
                                        <div class="col-lg-12">                                      
                                        <div class="row no-gutters input-right-icon mt-20">
                                            <div class="col">
                                                <div class="row no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="input-effect">
                                                            <input class="primary-input" type="text" id="placeholderFileOneName"
                                                                   placeholder="{{isset($editData)? $editData->image : '' }}"
                                                                   readonly
                                                            >
                                                            <span class="focus-border"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="primary-btn-small-input" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="document_file_1">@lang('lang.browse')</label>
                                                            <input type="file" class="d-none" name="image" id="document_file_1" >
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg">
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
                                <h3 class="mb-0"> @lang('lang.news')  @lang('lang.list')</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>
                                @if(session()->has('message-success') != "" ||
                                        session()->get('message-danger') != "")
                                    <tr>
                                        <td colspan="2">
                                            @if(session()->has('message-success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('message-success') }}
                                                </div>
                                            @elseif(session()->has('message-danger'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('message-danger') }}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th>@lang('lang.title')</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th> @lang('lang.action')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(isset($newsSubCategories))
                                    @foreach($newsSubCategories as $value)
                                        <tr>

                                            <td>{{$value->sub_category_name}}</td>
                                            <td>{{$value->NewsCategory->category_name}}</td>
                                            <td><img src="{{asset($value->image_path)}}\{{$value->image}}" height="70px" width="100px"></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                        @lang('lang.select')
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        <a class="dropdown-item" href="{{url('edit-sub-category/'.$value->id)}}"> @lang('lang.edit')</a>

                                                        <a class="deleteUrl dropdown-item" data-modal-size="modal-md" title="Delete Item Category" href="{{url('for-delete-sub-category/'.$value->id)}}"> @lang('lang.delete')</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

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

