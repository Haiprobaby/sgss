@extends('frontEnd.home.layout.front_master')
<title>{{$cate_post->news_title}}</title>
@section('main_content')

<!--PHAN DUOI NAY LA CUA PHU-->
<!--CSS-->
@push('css')
    <link href="/public/frontend/css/lifeSchool.css" rel="stylesheet">
@endpush
<!--END CSS-->


<img src="{{asset('public/')}}/images/banner-du-an.jpeg" alt="">
@if ($cate_post)
<div style="background-color: rgba(233, 238, 251, 0.746); width: 80%; margin: 50px auto; text-align: center; padding: 10px;">
    <h4 style="color: rgb(16, 114, 114); font-size: 22px">{{$cate_post->news_title}}</h4>
</div>
@if ($cate_post->news_title == 'Welcome from the Head of School')
    <img class="image" src="../../../{{$cate_post->image}}" alt="">
@endif
<div class="paragraph mb-4">
    <div class="editPostBody" style="width: 100%; overflow-x: scroll; margin: auto">
        <p>{!!$cate_post->news_body!!}</p>
    </div>
</div>
@endif
@endsection