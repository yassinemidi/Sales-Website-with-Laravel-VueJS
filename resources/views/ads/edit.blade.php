@extends('layouts.app')
@section('content')







<div class="container-fluid">
    <div class="row ">
        <div class="col-md-3">
            <!-- Sidebar -->
            @include('layouts.sidebar')
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-secondary">
                    Edit Your Ads
                </div>
                <div class="card-body">

                    <div class="card">
                        
                        <div class="body">
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                <div>
                                    <span class="alert-inner--icon"><i class="fa fa-times"></i></span>
                                    <span class="alert-inner--text"><strong>* </strong>{{$error}}</span>
                                </div>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            @endif
                            <form id="basic-form" method="post" action="{{route('advertisement.update',$ads->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div id="images_product">
                                    <p>Uploade Images for your Ads :</p>
                                    <div class="form-group floate-left d-inline-block" style="width: 30%;">
                                        <label for="image_0" class="d-block ml-4">
                                            <i class="fa fa-upload"></i>
                                            <span>Image 1:</span>
                                        </label>
                                        <image-0/>

                                    </div>
                                    <div class="form-group floate-left d-inline-block" style="width: 30%;">
                                        <label for="image_2" class="d-block ml-4">
                                            <i class="fa fa-upload"></i>
                                            <span>Image 2:</span>
                                        </label>
                                        <image-1/>

                                    </div>
                                    <div class="form-group d-inline-block" style="width: 30%;">
                                        <label for="image_1 " class="d-block ml-4">
                                            <i class="fa fa-upload"></i>
                                            <span>Image 3:</span>
                                        </label>
                                        <image-2/>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <category-dropdown />
                                </div>

                                <div class="form-group">
                                    <label for="name">Name of Ads :</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name ..." value="{{ $ads->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" rows="5" cols="30" name="description" id="description" placeholder="Description ...">{{ $ads->description }}</textarea>

                                </div>




                                <div class="form-group">
                                    <label for="price">Price (USD)</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Price in Dollar $" value="{{ $ads->price }}">
                                </div>

                                <div class="form-group">
                                    <label for="price_status">Price status :</label>
                                    <br>
                                    <div class="custom-control custom-radio inline-cr">
                                        <input type="radio" name="price_status" checked="{{$ads->price_status=='fix' ? 'checked' :'false'}}" class="custom-control-input" id="fix" value="fix" data-parsley-errors-container="#error-radio" data-parsley-multiple="price_status">
                                        <label class="custom-control-label" for="fix">Fix</label>
                                    </div>
                                    <div class="custom-control custom-radio inline-cr">
                                        <input type="radio" name="price_status" checked="{{$ads->price_status=='negociable' ? 'checked' :'false'}}" class="custom-control-input" id="negociable" value="negociable" data-parsley-multiple="price_status">
                                        <label class="custom-control-label" for="negociable">Negociable</label>
                                    </div>
                                    <p id="error-radio"></p>
                                </div>

                                <div class="form-group">
                                    <label for="condition">Product Condition :</label>
                                    <br>
                                    <div class="custom-control custom-radio inline-cr">
                                        <input type="radio" name="condition" checked="{{$ads->condition=='likenew' ? 'checked' :'false'}}" class="custom-control-input" id="likenew" value="likenew" data-parsley-errors-container="#error-radio" data-parsley-multiple="condition">
                                        <label class="custom-control-label" for="likenew">likenew</label>
                                    </div>
                                    <div class="custom-control custom-radio inline-cr">
                                        <input type="radio" name="condition" checked="{{$ads->condition=='heavilyused' ? 'checked' :'false'}}" class="custom-control-input" id="heavilyused" value="heavilyused" data-parsley-multiple="condition">
                                        <label class="custom-control-label" for="heavilyused">heavilyused</label>
                                    </div>

                                    <div class="custom-control custom-radio inline-cr">
                                        <input type="radio" name="condition" checked="{{$ads->condition=='new' ? 'checked' :'false'}}" class="custom-control-input" id="new" value="new" data-parsley-multiple="condition">
                                        <label class="custom-control-label" for="new">new</label>
                                    </div>
                                    <p id="error-radio"></p>
                                </div>




                                <div class="form-group">
                                    <label for="location">Listing Location :</label>
                                    <input type="text" class="form-control" name="location" id="location" value="{{ $ads->location }}" placeholder="Where this is disponible ...">
                                </div>

                                <div class="form-group">
                                   <adress-dropdown />
                                </div>


                                <div class="form-group">
                                    <label for="phone_number">Seller contact Number :</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{$ads->phone_number }}" placeholder="+xxxxxxxxxxx ...">
                                </div>

                                <div class="form-group">
                                    <label for="link">Demo link of Product (ie:Youtube) :</label>
                                    <input type="text" class="form-control" name="link" id="link" value="{{$ads->link}}" placeholder="https://example.com/JII?HY&VyXr65">
                                </div>






                                <br>
                                <button type="submit" class="btn btn-primary">Validate</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>







@endsection