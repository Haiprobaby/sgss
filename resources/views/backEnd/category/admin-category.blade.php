@extends('backEnd.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/css')}}/lightbox.css">
@endsection
@section('script')
<script src="{{asset('public/backEnd/js/')}}/lightbox-plus-jquery.js"></script>
@endsection
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.home') @lang('lang.settings')@lang('lang.page')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.front') @lang('lang.settings')</a>
                <a href="#">@lang('lang.home') @lang('lang.page')</a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid p-0">
        <div class="row mb-40">
            <div class="col-lg-12">
                <div class="row mb-30">
                    <div class="col-lg-8">
                        <div class="main-title">
                            <h3>Categories Imgages</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        @if ($msg = Session::get("success"))
                        <div class="alert alert-success" role="alert">
                            {{ $msg }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 pr-0">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-lg-8">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control @error('title') is-invalid @enderror" type="text" name="title" autocomplete="off" value="{{old('title')}}">
                                                    <label>@lang('lang.title')</label>
                                                    <span class="focus-border"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 text-center pl-0">
                                                <button type="submit" class="primary-btn small fix-gr-bg">
                                                    @lang('lang.upload')
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input id="images" type="file" name="imgs[]" multiple accept='image/*'>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4>Albums</h4>
                                        </div>
                                        <div class="col-4 text-right">
                                            <h4><strong>{{count($album)}}</strong></h4>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    @if (count($album) > 0)
                                    <div class="row">
                                        @foreach ($album as $i)
                                        <div class="col-md-4 pr-0 mb-10">
                                            <div class="">
                                                <div class="text-center" style="text-transform: uppercase">
                                                    <strong>{{ $i['album']['title'] }}</strong>
                                                </div>
                                                <div class="card-body">
                                                    @foreach ($i["gallery"] as $img)
                                                    <a href="public/uploads/category/{{ $img['path'] }}" data-lightbox="{{ $i['album']['id'] }}">
                                                        @if ($loop->index == 0)
                                                        <img src="public/uploads/category/{{ $img['path'] }}" alt="{{ $img['created_at'] }}" width="100%" height="100" style="border-radius: 10px; object-fit: cover">
                                                        @endif
                                                    </a>
                                                    @endforeach
                                                    <div class="row">
                                                        <div class="col">
                                                            {{ Form::open(['method' => 'POST', 'url' => 'admin-category/display', 'enctype' => 'multipart/form-data']) }}
                                                            <input type="hidden" name="display_album" value="{{$i['album']['id']}}">
                                                            <button type="submit" class="primary-btn fix-gr-bg small mt-10">
                                                                @if ($display_album)
                                                                @if ($display_album->album_id == $i['album']['id'])
                                                                <span class="ti-check"></span>
                                                                @endif
                                                                @endif
                                                                Display
                                                            </button>
                                                            {{ Form::close() }}
                                                            </a>
                                                        </div>
                                                        <div class="col">
                                                            <a data-toggle="modal" data-target="#deleteGallery{{$i['album']['id']}}" href="#">
                                                                <button type="submit" class="primary-btn small mt-10">
                                                                    Delete
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade admin-query" id="deleteGallery{{$i['album']['id']}}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">Delete Album</h6>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4>@lang('lang.are_you_sure_to_delete')</h4>
                                                            <img src="public/uploads/category/{{ $img['path'] }}" alt="{{ $img['created_at'] }}" width="200" height="100" style="border-radius: 10px; object-fit: cover">
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                                                            {{ Form::open(['method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
                                                            <input type="hidden" name="album_id" value="{{$i['album']['id']}}">
                                                            <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')</button>
                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <p>Empty</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
