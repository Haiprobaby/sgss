@extends('frontEnd.home.layout.front_master')
@section('main_content')


<section class="container box-1420">
<div class="banner-inner">
            <img width="100%" src="https://sgstar.edu.vn/images/banner/summercamp.png">
        </div>
</section>
<div class="container">

        
        
        <h3>{{$name_subcate->sub_category_name}}</h3>
        <p>{{$name_subcate->description}}</p>
        <div class="col">
            <div class="row">
                
                @foreach($items as $item)
                <div class="col-12 col-md-6 col-lg-4 item" >
                    <a href="{{url('news-details/'.$item->id)}}" title="View Details">
                    <div class="card" >
                        <div class="ItemImage">
                        <img class="card-img-top" src="{{asset($item->image)}}" height="auto" width="auto" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{str_limit($item->news_title,50)}}</h4>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
                
            </div>
            
        </div>

</div>


@endsection