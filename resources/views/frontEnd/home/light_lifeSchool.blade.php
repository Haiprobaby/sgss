{{-- Cai nay la cua Phu --}}
@extends('frontEnd.home.layout.front_master')
@section('main_content')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/css')}}/lightbox.css">
@endpush
@section('script')
<script src="{{asset('public/backEnd/js/')}}/lightbox-plus-jquery.js"></script>
@endsection
@push('css')
    <link href="/public/frontend/css/lifeSchool.css" rel="stylesheet">
@endpush
<section class="academics-area mt-20">
   <img src="{{asset('public/')}}/images/banner-du-an.jpeg" alt="">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <h3 class="title">Our School Gallery</h3>
                    </div>
                </div>
                <div class="row">
                    @if (!count($album))
                    <div class="col-lg-12 col-md-12">
                        <div class="text-center">
                            <p>Empty</p>
                        </div>
                    </div>
                    @else
                    @for ($i = 0; $i < count($album); $i++)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="academic-item">
                                <div class="academic-img img-hover-zoom">
                                    @foreach ($album[$i]["gallery"] as $img)
                                    <a href="/life-school/{{str_replace(" ","-", $album[$i]['album']->title)}}">
                                        <div style="opacity: 0" onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" class="overlayCategory">
                                            <div class="nameOfCategory">{{$album[$i]['album']->title}}({{count($album[$i]["gallery"])}})</div>
                                        </div>
                                        @if ($loop->index == 0)
                                            <img src="public/uploads/category/{{ $img['path'] }}" alt="{{ $img['created_at'] }}" style="border-radius: 10px; object-fit: cover">
                                        @endif
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection