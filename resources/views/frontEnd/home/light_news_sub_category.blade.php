@extends('frontEnd.home.layout.front_master')
@section('main_content')

<!--CAI NAY CUA HAI-->

<section class="container box-1420">
<div class="banner-inner">
            <img width="100%" src="https://sgstar.edu.vn/images/banner/summercamp.png">
        </div>
</section>
<div class="container">

        
        <h3>{{$name_cate->category_name}}</h3>
        

        <div class="col">
            <div class="row">
                <p> {{$name_cate->description}}</p>
                @foreach($subcate as $cate)
                <div class="col-12 col-md-6 col-lg-4 item" >
                    <a href="{{url('category-items/'.$cate->id)}}" title="View Details">
                    <div class="card news-card h-100" >
                        <div class="ItemImage">
                        <img class="card-img-top" src="{{asset($cate->image_path)}}\{{$cate->image}}" height="auto" width="auto" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{$cate->sub_category_name}}</h4>
                            <p class="card-text"></p>
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
                
            </div>
            {!!$subcate->links()!!}
        </div>

</div>


@endsection