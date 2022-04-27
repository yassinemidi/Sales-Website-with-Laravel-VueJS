@extends('backend.layouts.master')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-5">
            <div class="card-header text-center">
                <!-- <h4 class="h4 ">Add Category</h4> -->
                <h5 class="heading heading-5 strong-600">Add Category</h5>
            </div>
            <div class="card-body">
                <form id="basic-form" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter the name of Category :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <input type="file" name="image" id="image" class="custom-input-file form-control @error('image') is-invalid @enderror" />
                        <label for="image">
                            <i class="fa fa-upload"></i>
                            <span>Choose an Image</span>
                        </label>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection