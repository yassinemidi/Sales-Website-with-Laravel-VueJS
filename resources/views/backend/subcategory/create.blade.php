@extends('backend.layouts.master')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-5">
            <div class="card-header text-center">

                <h5 class="heading heading-5 strong-600">Add SubCategory</h5>
            </div>
            <div class="card-body">
                <form id="basic-form" action="{{route('subcategory.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter the name of SubCategory :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <!-- start -->
                    <div class="form-group">

                        <select class="selectpicker form-control  @error('category_id') is-invalid @enderror" name="category_id" title="Chose the Category" data-live-search="true" data-live-search-placeholder="Search ...">
                            @foreach(App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>


                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                    </div>
                    <!-- end -->

                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection