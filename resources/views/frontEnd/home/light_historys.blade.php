@extends('frontEnd.home.layout.front_master')
<title>Historys</title>
@section('main_content')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/css')}}/lightbox.css">
@endpush
@section('script')
<script src="{{asset('public/backEnd/js/')}}/lightbox-plus-jquery.js"></script>
@endsection
@push('css')
<style>
    @media (max-width: 729px){
        .nameOfSchool{
            font-size: 27px;
        }
        .infomation-school p{
            font-size: 14px;
        }
        .academic-item{
            width: 105%;
        }
        .overlayCategory{
            width: 100%;
        }
    }
    @media (max-width: 550px){
        .nameOfSchool{
            font-size: 20px;
        }
        .infomation-school p{
            font-size: 12px;
        }
        .timeline-header__title{
            font-size: 28px; 
        }
        .academic-item{
            width: 107%;
        }
        .historysTitleImage{
            width: 93%;
        }
    }
    @media (max-width: 413px){
        .nameOfSchool{
            font-size: 17px;
        }
        .infomation-school p{
            font-size: 11px;
        }
        .academic-item{
            width: 109%;
        }
    }
    @media (max-width: 353px){
        .nameOfSchool{
            font-size: 15px;
        }
        .infomation-school p{
            font-size: 10px;
        }
        .timeline-header__title{
            font-size: 20px; 
        }
        .academic-item{
            width: 112%;
        }
        .historysTitleImage{
            font-size: 24px; 
        }
    }
</style>
@endpush
<section id="academics-area" class="academics-area">
    <img  src="https://sgstar.edu.vn/images/banner-du-an.jpg" alt="">
    <h1 style="color: rgb(16, 114, 114); text-align: center" class="nameOfSchool mt-2">SAIGON STAR INTERNATIONAL SCHOOL</h1>
    <div class="infomation-school mb-5">
        <p> - Saigon Star International School is an International School in Ho Chi Minh City, permitted to operate under Ho Chi Minh City Department of Education</p>
        <p> - It provides the English National Curriculum in addition to the IEYC, IPC & IMYC, and is a registered Cambridge International Examination Centre</p>
        <p> - Located in a quiet peaceful, green area of the city, near Diamond Island in District 2</p>
        <p> - Saigon Star also became a registered Cambridge International Examination Centre in March 2009.</p>
        <p> - Internationally-qualified teachers</p>
        <p> - 100% native-English teachers</p>
        <p> - Class sizes limited to 20 students</p>
    </div>
    <div class="timeline-container" id="timeline-1">
        <div class="timeline-header">
            <h2 class="timeline-header__title">SAIGON STAR INTERNATIONAL SCHOOL</h2>
        </div>
        <div class="timeline">
            @foreach ($list_cate as $item)
                <div class="timeline-item" data-text="SAIGON STAR - {{$item->news_title}}">
                    <div class="timeline__content"><img class="timeline__img" src="{{$item->image}}"/>
                        <h2 class="timeline__content-title">{{$item->news_title}}</h2>
                        <p class="timeline__content-desc">{!!$item->news_body!!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <p class="historysTitleImage">Our School Gallery</p>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @if (!count($album))
                    <div class="col-lg-12 col-md-12">
                        <div class="text-center">
                            <p>Empty</p>
                        </div>
                    </div>
                    @elseif(count($album) >= 6)
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="academic-item">
                                <div class="academic-img img-hover-zoom">
                                    @foreach ($album[$i]["gallery"] as $img)
                                    <a href="public/uploads/category/{{ $img['path'] }}" data-lightbox="{{ $album[$i]['album']['id'] }}">
                                        <div style="opacity: 0" onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" class="overlayCategory">
                                            <div class="nameOfCategory">{{$nameOfCategories[$i]->title}}({{count($album[$i]["gallery"])}})</div>
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
                    @else
                    @for ($i = 0; $i < count($album); $i++)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="academic-item">
                                <div class="academic-img img-hover-zoom">
                                    @foreach ($album[$i]["gallery"] as $img)
                                    <a href="public/uploads/category/{{ $img['path'] }}" data-lightbox="{{ $album[$i]['album']['id'] }}">
                                        <div style="opacity: 0" onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" class="overlayCategory">
                                            <div class="nameOfCategory">{{$nameOfCategories[$i]->title}}({{count($album[$i]["gallery"])}})</div>
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
    <div style="margin: auto" class="col-6 col-sm-5 col-md-4 col-lg-3 mt-5">
        <a href="/category"><button class="btn btn-primary btn-block viewMoreGallery">View More</button></a>
    </div>
    <div class="box_maps mt-5">
        <iframe allowfullscreen="" frameborder="0" height="250px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.794845591907!2d106.76020697176476!3d10.76607169864385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525b6a19736e3%3A0x24fd5bbf12a59bc1!2sSaigon+Star+International+School!5e0!3m2!1sen!2s!4v1533871897065" style="border:0" width="100%"></iframe>
        </div>
        <div class="full left" style="text-align: center;">
        <a href="https://www.google.com/maps/place/Saigon+Star+International+School/@10.7596416,106.7616962,14.87z/data=!4m5!3m4!1s0x317525b6a19736e3:0x24fd5bbf12a59bc1!8m2!3d10.7663396!4d106.7610492" target="_blank" class="download">GET DIRECTIONS</a>
    </div>
</section>

@endsection