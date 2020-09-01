@extends('frontEnd.home.front_master')
@section('main_content')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/css')}}/lightbox.css">
@endpush
@section('script')
<script src="{{asset('public/backEnd/js/')}}/lightbox-plus-jquery.js"></script>
@endsection
<section class="academics-area mt-20">
    <div class="container">
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
                    @foreach($album as $i)
                    <div class="col-lg-4 col-md-6">
                        <div class="academic-item">
                            <div class="academic-img">
                                @foreach ($i["gallery"] as $img)
                                <a href="public/uploads/category/{{ $img['path'] }}" data-lightbox="{{ $i['album']['id'] }}">
                                    @if ($loop->index == 0)
                                    <img src="public/uploads/category/{{ $img['path'] }}" alt="{{ $img['created_at'] }}" style="border-radius: 10px; object-fit: cover">
                                    @endif
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection