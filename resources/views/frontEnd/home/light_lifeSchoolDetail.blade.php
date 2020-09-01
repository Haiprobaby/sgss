<!--PHAN DUOI NAY LA CUA PHU-->
@extends('frontEnd.home.layout.front_master')
@if($cate_post)
<title>{{$cate_post->news_title}}</title>
@endif
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

@if ($imagesPhoto)
<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        @for ($i = 0; $i < count($imagesPhoto); $i++)
            <div class="carousel-item @if($i == 0) active @endif">
                <img class="d-block w-100" src="../../../public/uploads/category/{{$imagesPhoto[$i]->path}}" alt="">
            </div>
        @endfor
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<img src="{{asset('public/')}}/images/banner-du-an.jpeg" alt="">
<div class="allImage mt-4" style="background-color: rgba(241, 241, 241, 0.5); padding: 15px; overflow-x: scroll;">
        <div style="display: flex; width: {{(count($imagesPhoto) + 1) * 250}}px; margin: auto;">
            @for ($i = 0; $i < count($imagesPhoto); $i++)
                <div class="carousel-inner mr-2">
                    <div class="carousel-item active">
                        @for ($j = 0; $j < count($imagesPhoto); $j++)
                            <a class="images" @if($j > 0) style="display: none" @endif href="../../../public/uploads/category/{{$imagesPhoto[$i]->path}}" data-lightbox="{{$imagesPhoto[$j]->id}}">
                                <img src="../../../public/uploads/category/{{$imagesPhoto[$i]->path}}" class="d-block w-100" alt="...">
                            </a>
                        @endfor
                    </div>
                </div>
            @endfor
    </div>
</div>
@if ($cate_post)
<div style="background-color: rgba(233, 238, 251, 0.746); width: 80%; margin: 50px auto; text-align: center; padding: 10px;">
    <h4 style="color: rgb(16, 114, 114)">Category/{{$imagesAlbum->title}}</h4>
</div>
<div class="catePost">
    <h4 style="text-align: center; margin-top: -10px">{{$imagesAlbum->title}}</h4>
    <img src="../../../public/uploads/category/{{$imagesPhoto[rand(0, count($imagesPhoto) - 1)]->path}}" alt="">
    <div class="paragraph">
        <p>{!!$cate_post->news_body!!}</p>
    </div>
    @if ($imagesAlbum->title == "On the bus")
        <img id="bus" src="../../../{{$cate_post->image}}" alt="">
    @endif
</div>
@endif
@else
    <img  src="https://sgstar.edu.vn/images/banner-du-an.jpg" alt="">
    <div style="background-color: rgba(233, 238, 251, 0.746); width: 80%; margin: 50px auto; text-align: center; padding: 10px;">
        <h4 style="color: rgb(16, 114, 114)">Category/{{$cate_post->news_title}}</h4>
    </div>
    <div class="catePost">
        <h4 style="text-align: center; margin-top: -10px">{{$cate_post->news_title}}</h4>
        <img src="../../../{{$cate_post->image}}" alt="">
        <div class="paragraph">
            <p>{!!$cate_post->news_body!!}</p>
        </div>
    </div>
@endif
<div class="box_maps mt-5">
    <iframe allowfullscreen="" frameborder="0" height="250px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.794845591907!2d106.76020697176476!3d10.76607169864385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525b6a19736e3%3A0x24fd5bbf12a59bc1!2sSaigon+Star+International+School!5e0!3m2!1sen!2s!4v1533871897065" style="border:0" width="100%"></iframe>
    </div>
    <div class="full left" style="text-align: center;">
</div>
@endsection