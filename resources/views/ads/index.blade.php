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
                    Manage Your Ads
                </div>
                <div class="card-body">

                    <div class="card">
                        @if(session('msg'))
                        <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                            <span class="alert-inner--icon"><i class="fa fa-check"></i></span>
                            <span class="alert-inner--text"><strong>Success!</strong> {{session('msg')}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($adss as $key => $ads)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td style="width: 200px; height: 130px;">
                                                <div id="carouselExampleControls{{$ads->id}}" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100 rounded " src="{{Storage::url($ads->image_0)}}" alt="" width="100" style="height: 100px;">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100 rounded " src="{{Storage::url($ads->image_2)}}" alt="" width="100" style="height: 100px;">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100 rounded " src="{{Storage::url($ads->image_1)}}" alt="" width="100" style="height: 100px;">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleControls{{$ads->id}}" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleControls{{$ads->id}}" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>

                                            </td>
                                            <td>{{$ads->name}}</td>
                                            <td class="text-primary">{{$ads->price}} USD</td>
                                            <td>
                                                @if($ads->published == 1)
                                                <span class="badge badge-lg badge-pill badge-success text-uppercase">Published</span>

                                                @else
                                                <span class="badge badge-lg badge-pill badge-danger text-uppercase">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="text-white btn btn-primary" href="{{route('product.view',$ads->id)}}">View</a>
                                            </td>
                                            <td>
                                                <a href="{{route('advertisement.edit',$ads->id)}}"><button type="button" class="btn btn-info " title="Edit"><i class="fa fa-edit"></i></button></a>
                                                <button type="button" class="btn btn-danger " title="Delete" data-toggle="modal" data-target="#exampleModal_{{$ads->id}}"><i class="fa fa-trash-o"></i></button>
                                                <div class="modal fade" id="exampleModal_{{$ads->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation :</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sur that you want to delete the {{$ads->name}} advertisement ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('del_{{$ads->id}}').submit();">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{route('advertisement.destroy',[$ads->id])}}" method="post" id="del_{{$ads->id}}" hidden>
                                                    @csrf
                                                    @method('DELETE')

                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <td>You have any Ads !</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>







    @endsection