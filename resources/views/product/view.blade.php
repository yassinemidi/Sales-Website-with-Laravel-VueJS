@extends('layouts.app')
@section('content')

<div class="container " >

    <div class="card">
        <div class="card-header bg-light">
            <a href="{{route('category.show',[
                                $ad->category->slug,
                            ])}}">{{$ad->category->name}}</a> / <a href="{{route('subcategory.show',[
                        $ad->category->slug,
                        $ad->subcategory->slug
                    ])}}">{{$ad->subcategory->name}}</a> / <a href="{{route('childcategory.show',[
                        $ad->category->slug,
                        $ad->subcategory->slug,
                        $ad->childcategory->slug
                    ])}}">{{$ad->childcategory->name}}</a>
        </div>
        <div class="card-body">


            <div class="row ">
                <div class="col-md-6">

                    <div id="images_product" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#images_product" data-slide-to="0" class="active"></li>
                            <li data-target="#images_product" data-slide-to="1"></li>
                            <li data-target="#images_product" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{Storage::url($ad->image_0)}}" class="d-block w-100 rounded" alt="..." style="max-height: 400px;">
                            </div>
                            <div class="carousel-item">
                                <img src="{{Storage::url($ad->image_1)}}" class="d-block w-100 rounded" alt="..." style="max-height: 400px;">
                            </div>
                            <div class="carousel-item">
                                <img src="{{Storage::url($ad->image_2)}}" class="d-block w-100 rounded" alt="..." style="max-height: 400px;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#images_product" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#images_product" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <hr>
                    <div class="card border">
                        <div class="card-body">
                            <h5 class="heading heading-5">Description :</h5>
                            <p> {!! $ad->description !!}</p>
                        </div>
                    </div>

                    <hr>
                    <div class="card border">
                        <div class="card-body">
                            <h5 class="heading heading-5">More Info</h5>
                            <p>Country : {{$ad->country->name}}</p>
                            <p>State : {{$ad->state->name??''}}</p>
                            <p>City : {{$ad->city->name??''}}</p>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-body mx-auto p-0">
                            {!! $ad->displayVideo() !!}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>{{$ad->name}}</h1>
                            <p>Price: ${{$ad->price}} USD, ({{$ad->price_status=='fix'?'Fix':''}}{{$ad->price_status=='negociable'?'Negociable':''}})</p>
                            <p>Product condition: {{$ad->condition=='new'?'New':''}}{{$ad->condition=='likenew'?'Like New':''}}{{$ad->condition=='heavilyused'?'Heavily Used':''}}</p>
                            <p>Posted: {{$ad->created_at->diffForHumans()}}</p>
                            <p>Listing Location: {{$ad->location??''}}</p>


                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="heading heading-5">Seller :</h5>
                            <div class="row">

                                <div class="col-md-4">

                                    @if(!$ad->user->avatar)
                                    <img src="/man.jpg" class="rounded-circle" alt="" width="100" height="100">
                                    @else
                                    <img src="{{Storage::url($ad->user->avatar)}}" class="rounded-circle" alt="" width="100" height="100">
                                    @endif

                                    <p style="width: 100px; text-align: center; margin-top: 2px;">{{$ad->user->first_name}} {{$ad->user->last_name}}</p>
                                </div>
                                @if(auth()->check() && $ad->user_id != auth()->id())
                                <div class="col-md-8">
                                    <message seller-name="{{$ad->user->first_name}}"
                                        user-id="{{auth()->user()->id}}"
                                        receiver-id="{{$ad->user->id}}"
                                        ad-id="{{$ad->id}}"
                                        ></message>
                                        @if($ad->phone_number)
                                        <phonenumber phone-number="{{$ad->phone_number}}"></phonenumber>
                                        @endif
                                </div>
                                @endif
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection