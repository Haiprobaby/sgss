@extends('frontEnd.home.layout.front_master')
@push('css')
<link rel="stylesheet" href="{{asset('public/')}}/frontend/css/new_style.css" />
@endpush
@section('main_content')
<section class="container">
    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="post-title">
                <h3>{{$news->news_title}}</h3>
            </div>
            <div class="news-body">
                <p>{!!$news->news_body!!}</p>
            </div>            
        </div>
        <div class="col-lg-3 col-md-0 col-sm-0">
            <div class="right-col">
                <a href="https://www.facebook.com/saigonstarschool" target="_blank" title="View Details">
                    <div>
                        <div class="ItemImage">
                            <img class="card-img" src="//img.nordangliaeducation.com/resources/asia/_filecache/65c/c1b/198965-cropped-w300-h185-of-1-FFFFFF-student-wellbeing--bis-hcmc-thumbnail.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><strong>Have you seen our social media wall?</strong></h5>
                            <p class="card-text">Get the feel of life at Saigonstar International School through our social media wall,where our school community share social posts using our very own hastag.</p>
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <h4>Related Posts</h4>
</section>


{{--<h2>{{$news->news_title}}</h2>

<p class="mt-2">
    {!!$news->news_body!!}
</p>               
</div>

<div class="col-lg-3 notice-board-area">
    <div class="right-col">
        <a href="https://www.facebook.com/saigonstarschool" target="_blank" title="View Details">
            <div>
                <div class="ItemImage">
                    <img class="card-img" src="//img.nordangliaeducation.com/resources/asia/_filecache/65c/c1b/198965-cropped-w300-h185-of-1-FFFFFF-student-wellbeing--bis-hcmc-thumbnail.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title"><strong>Have you seen our social media wall?</strong></h4>
                    <p class="card-text">Get the feel of life at Saigonstar International School through our social media wall,where our school community share social posts using our very own hastag.</p>
                    <div class="row">

                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="title">Notice Board</h3>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-lg-12">
            <div class="notice-board">
                @if(isset($notice_board))
                @foreach($notice_board as $notice)
                <div class="notice-item">
                    <p class="date">

                        {{$notice->publish_on != ""? App\SmGeneralSettings::DateConvater($notice->publish_on):''}}

                    </p>
                    <h4>{{$notice->notice_title}}</h4>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!--================ End News Details Area =================-->

<!--================ Related News Area =================-->

<!--================ End Related News Area =================-->


<!--END CAI NAY CUA HAI-->
--}}
@endsection