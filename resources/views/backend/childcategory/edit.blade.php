@extends('backend.layouts.master')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-5">
            <div class="card-header text-center">

                <h5 class="heading heading-5 strong-600">Add ChildCategory</h5>
            </div>
            <div class="card-body">
                <form id="basic-form" action="{{route('childcategory.update',[$childcategory->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Enter the name of ChildCategory :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $childcategory->name }}" id="name" name="name" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <!-- start -->
                    <div class="form-group">

                        <select class="selectpicker form-control  @error('subcategory_id') is-invalid @enderror" name="subcategory_id" title="Chose the SubCategory" data-live-search="true" data-live-search-placeholder="Search ...">

                            @foreach(App\Models\Category::all() as $category)
                            <optgroup label="{{$category->name}}">
                                @foreach($category->subcategories as $subcategory)
                                <option value="{{$subcategory->id}}" {{ ($subcategory->id == $childcategory->subcategory_id) ? 'selected' :''}}>{{$subcategory->name}}</option>
                                @endforeach
                            </optgroup>
                            @endforeach

                        </select>

                        @error('subcategory_id')
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