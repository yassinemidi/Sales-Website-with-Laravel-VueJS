@extends('layouts.app')
@section('content')







<div class="container-fluid">

    <div class="row">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-body mx-auto">
                    @if(!$user->avatar)
                    <img src="\man.jpg" class="rounded-circle " width="90" height="90">


                    @else
                    <img src="{{Storage::url($user->avatar)}}" class="rounded-circle" width="90" height="90">

                    @endif
                    <h3 class="h4 text-center mt-2 d-block">{{$user->first_name}} {{$user->last_name}}</h3>
                </div>
            </div>


        </div>
        <div class="col-md-9">
        <div class="card">
                <div class="card-header bg-secondary text-dark">List of Ads</div>
                <div class="card-body ">
                    <div class="row mx-auto " style="width: 100%;">
                        @forelse($ads as $ad)
                        <div class="col-lg-3">
                            <div class="card p-2 mx-auto" style="max-width: 20rem;">
                                <img src="{{Storage::url($ad->image_0)}}" class="card-img-top img-thumbnail" alt="..." style="height: 220px;">
                                <div class="card-body">
                                    <h5 class="card-title mb-0">{{$ad->name}}</h5>
                                    <p class="card-text mb-2">
                                        <span>{{$ad->price}} USD ({{$ad->price_status=='fix'?'Fix':''}}{{$ad->price_status=='negociable'?'Negociable':''}})</span><br>
                                        <span>{{$ad->condition=='new'?'New':''}}{{$ad->condition=='likenew'?'Like New':''}}{{$ad->condition=='heavilyused'?'Heavily Used':''}}</span><br>

                                    </p>
                                    <a href="{{route('product.view',[$ad->id])}}" class="btn bg-info float-right stretched-link">View</a>

                                </div>
                            </div>
                        </div>

                        @empty
                        <span>Sorry, we are unable to find product based on this category</span>
                        @endforelse
                    </div>
                </div>
            </div>
            {{$ads->links()}}

        </div>

    </div>


</div>







@endsection