@extends('layouts.app')
@section('content')

<div class="slider" style="margin-top: -25px;">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="2500">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/slider/slider1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/slider2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/slider3.png" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    @foreach($category_carousel as $ads)
    <span>
        <h1>{{$ads['first'][0]->category->name}}</h1>
        <a href="{{route('category.show',$ads['first'][0]->category->slug)}}" class="float-right">View All</a>
    </span>
    <br>
    <div id="carouselExampleIndicators{{$ads['first'][0]->category->id}}" class="carousel slide " data-ride="carousel" data-interval="3500">

        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators{{$ads['first'][0]->category->id}}" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators{{$ads['first'][0]->category->id}}" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-3">
                        <a href="{{route('product.view',$ads['first'][0]->id)}}">
                        <img src="{{Storage::url($ads['first'][0]->image_0)}}" class="img-thumbnail" style="width:255px; height: 200px;">
                        <p class="text-center card-footer text-muted">{{$ads['first'][0]->name}}</p>
                        </a>
                    </div>
                    <div class="col-3">
                    <a href="{{route('product.view',$ads['first'][1]->id)}}">
                        <img src="{{Storage::url($ads['first'][1]->image_0)}}" class="img-thumbnail" style="width:255px; height: 200px;">
                        <p class="text-center card-footer text-muted">{{$ads['first'][1]->name}}</p>
                        </a>
                    </div>
                    <div class="col-3">
                    <a href="{{route('product.view',$ads['first'][2]->id)}}">
                        <img src="{{Storage::url($ads['first'][2]->image_0)}}" class="img-thumbnail" style="width:255px; height: 200px;">
                        <p class="text-center card-footer text-muted">{{$ads['first'][2]->name}}</p>
                        </a>
                    </div>
                    <a href="{{route('product.view',$ads['first'][3]->id)}}">
                    <div class="col-3">
                        <img src="{{Storage::url($ads['first'][3]->image_0)}}" class="img-thumbnail" style="width:255px; height: 200px;">
                        <p class="text-center card-footer text-muted">{{$ads['first'][3]->name}}</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="carousel-item ">
                <div class="row">
                    <div class="col-3">
                    <a href="{{route('product.view',$ads['second'][0]->id)}}">
                        <img src="{{Storage::url($ads['second'][0]->image_0)}}" class="img-thumbnail" style="width:255px; height: 200px;">
                        <p class="text-center card-footer text-muted">{{$ads['second'][0]->name}}</p>
                        </a>
                    </div>
                    <div class="col-3">
                    <a href="{{route('product.view',$ads['second'][1]->id)}}">
                        <img src="{{Storage::url($ads['second'][1]->image_0)}}" class="img-thumbnail" style="width:255px; height: 200px;">
                        <p class="text-center card-footer text-muted">{{$ads['second'][1]->name}}</p>
                        </a>
                    </div>
                    <div class="col-3">
                    <a href="{{route('product.view',$ads['second'][2]->id)}}">
                        <img src="{{Storage::url($ads['second'][2]->image_0)}}" class="img-thumbnail" style="width:255px; height: 200px;">
                        <p class="text-center card-footer text-muted">{{$ads['second'][2]->name}}</p>
                        </a>
                    </div>
                    <div class="col-3">
                    <a href="{{route('product.view',$ads['second'][3]->id)}}">
                        <img src="{{Storage::url($ads['second'][3]->image_0)}}" class="img-thumbnail" style="width:255px; height: 200px;">
                        <p class="text-center card-footer text-muted">{{$ads['second'][3]->name}}</p>
                        </a>
                    </div>
                </div>
            </div>



        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators{{$ads['first'][0]->category->id}}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators{{$ads['first'][0]->category->id}}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @endforeach
</div>
@endsection