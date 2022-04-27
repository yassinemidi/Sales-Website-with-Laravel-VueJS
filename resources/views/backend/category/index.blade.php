@extends('backend.layouts.master')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10 m-2">
        <div class="card mt-5">
            <div class="card-header text-center">
                
                <h5 class="heading heading-5 strong-600">Manage categories</h5>
            </div>
            @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                <span class="alert-inner--icon"><i class="fa fa-check"></i></span>
                <span class="alert-inner--text"><strong>Success!</strong> {{session('msg')}}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card-body">
                <table class="table table-hover table-cards align-items-center">
                    <thead>
                        <tr>
                            <th scope="col" class="pl-5">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr class="bg-white">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <img src="{{Storage::url($category->image)}}" class="avatar avatar-lg mr-3">
                                    <div class="media-body">
                                        <h6 class="h5 font-weight-normal mb-0">{{$category->name}}</h6>
                                    </div>
                                </div>
                            </th>

                            <td>
                                <a href="{{route('category.edit',['category'=>$category->id])}}"><button type="button" class="btn btn-info " title="Edit"><i class="fa fa-edit"></i></button></a>
                                <button type="button" class="btn btn-danger " title="Delete" data-toggle="modal" data-target="#exampleModal_{{$category->id}}"><i class="fa fa-trash-o"></i></button>
                                <div class="modal fade" id="exampleModal_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation :</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sur that you want to delete the {{$category->name}} category ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('del_{{$category->id}}').submit();">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('category.destroy',[$category->id])}}" method="post" id="del_{{$category->id}}" hidden>
                                    @csrf
                                    @method('DELETE')

                                </form>
                            </td>



                        </tr>
                        <tr class="table-divider"></tr>
                        @empty
                        <td>No Category to display</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection