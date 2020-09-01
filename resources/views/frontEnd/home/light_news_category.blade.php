@extends('frontEnd.home.layout.front_master')
@section('main_content')

<!--CAI NAY CUA HAI-->
<section class="container box-1420">
<div class="banner-inner">
            <img width="100%" src="https://sgstar.edu.vn/images/banner/summercamp.png">
        </div>
</section>
<section class="container news-lastest">
    <h4>Lastest posts</h4>
    <br>
    <div class="col nen">
        <div class="row">
            <div class="col-lg-5 item">
                <a href="{{url('news-details/'.$hotnews->id)}}" title="View Details">
                <div class="card news-card h-100" >
                    <div class="zoom img-hover-zoom">
                        <img class="card-img-top" src="{{asset($hotnews->image)}}"  alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h5>{{\Illuminate\Support\Str::limit($hotnews->news_title,70)}}</h5>
                        </div>
                        <div class="card-description">
                            <p class="card-text">{{$hotnews->description}}</p>
                        </div>                           
                    </div>
                        
                </div>
                </a>
            </div>
            <div class="col-lg-7">
                    <div class="row">
                        @foreach($newslist as $news)
                        <div class="col-lg-6 item" >
                            <a href="{{url('news-details/'.$news->id)}}" title="View Details">
                            <div class="card news-card h-100" >
                                <div class="zoom img-hover-zoom">
                                <img class="card-img-top" src="{{asset($news->image)}}" height="auto" width="auto" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5>{{\Illuminate\Support\Str::limit($news->news_title,70)}}</h5>
                                    </div>
                                                            
                                </div>
                                
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    
            </div>

        </div>
    </div>
    <br>
</section>
<div class="topnav" id="myTopnav">
    <div class="container">
          <a href="{{url('/')}}/news-page" class="@if(isset($id_cate)) no-active @else active @endif" >Home</a>
          @foreach($list_cate as $cate)
          <a href="{{url('/')}}/by-category/{{$cate->id}}" class="@if(isset($id_cate)&&$id_cate == $cate->id) active @else no-active @endif" >{{$cate->category_name}}</a>
          @endforeach
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
    </div>
    
</div>
<div class="container" >
    <div id="subcate-field">
    @if(isset($list_subcate))
        @foreach($list_subcate as $subcate)
        <a href="{{url('/')}}/by-subcategory/{{$subcate->id}}" type="button" class="btn btn-warning subcate-list @if(isset($sub_cate_id) && $sub_cate_id == $subcate->id) active @endif">{{$subcate->sub_category_name}}</a>
        @endforeach
    @else
    <div class="row">
        @foreach($latest_news as $lastest)
                    
                        <div class="col-lg-4 item" >
                            <a href="{{url('news-details/'.$lastest->id)}}" title="View Details">
                            <div class="card news-card h-100" >
                                <div class="zoom img-hover-zoom">
                                <img class="card-img-top" src="{{asset($lastest->image)}}" height="auto" width="auto" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5>{{\Illuminate\Support\Str::limit($lastest->news_title,70)}}</h5>
                                    </div>
                                                            
                                </div>
                                
                            </div>
                            </a>
                        </div>                                      
        @endforeach
        </div>    
    @endif
    </div>
    @if(isset($newslist_by_cate))
    <div class="row">
        @foreach($newslist_by_cate as $news_byCate)           
                <div class="col-12 col-md-6 col-lg-4 item" >
                    <a href="{{url('news-details/'.$news_byCate->id)}}" title="View Details">
                    <div class="card" >
                        <div class="ItemImage">
                        <img class="card-img-top" src="{{asset($news_byCate->image)}}" height="auto" width="auto" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{\Illuminate\Support\Str::limit($news_byCate->news_title,50)}}</h4>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>                  
        @endforeach
    </div>        
    @endif
    @if(isset($id_cate))
        @if(isset($sub_cate_id))
            <input type="hidden" name="" id="check" value="{{$sub_cate_id}}">
            <div class="float-right">
                <a href="{{url('/')}}/category-items/{{$sub_cate_id}}" type="button" class="btn btn-primary">See More</a> 
            </div>
        @else
            <input type="hidden" name="" id="check" value="{{$id_cate}}">
            <div class="float-right">
                <a href="{{url('/')}}/category/{{$id_cate}}" type="button" class="btn btn-primary">See More</a> 
            </div>
        @endif
    @endif
    
    
      
</div>

@endsection
@section('script')
<script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
            var check = $('#check').val();
            var destination = $("#myTopnav").offset().top-160;     
            if(check.length > 0)
            {
                $('html,body').animate({
                    scrollTop: destination},
                    500);
            }
        });
</script>
@endsection