@extends('layouts.app')
@section('content')

<div class="container-fluid ">
    <div class="row ">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-white text-center bg-tertiary text-white"><a href="{{route('category.show',[
                                $category->slug,
                            ])}}">{{$category->name}}</a> / <a href="{{route('subcategory.show',[
                        $category->slug,
                        $subcategory->slug
                    ])}}">{{$subcategory->name}}</a> / <a href="{{route('childcategory.show',[
                        $category->slug,
                        $subcategory->slug,
                        $childcategory->slug
                    ])}}">{{$childcategory->name}}</a></div>
                <div class="card-body">
                    @foreach($ad_has_childcategory as $ad)
                    <p>
                        <a href="{{$ad->childcategory->slug??''}}">{{$ad->childcategory->name??''}}</a>
                    </p>
                    @endforeach


                </div>

            </div>
            <br>
            <div class="card">
                <div class="card-header text-white text-center bg-danger text-white">Filter Price</div>
                <div class="card-body">
                    <form action="{{url()->current()}}" method="GET">
                        <div class="form-group">
                            <label for="min_price">Min Price</label>
                            <input type="text" class="form-control" id="min_price" name="min_price">
                        </div>
                        <div class="form-group">
                            <label for="max_price">Max Price</label>
                            <input type="text" class="form-control" id="max_price" name="max_price">
                        </div>

                        <button type="submit" class="btn btn-danger">Search</button>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-secondary text-dark">List of Ads</div>
                <div class="card-body ">
                    <div class="row mx-auto " style="width: 100%;">
                        @forelse($advertisements as $ad)
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

        </div>
    </div>
</div>

@endsection