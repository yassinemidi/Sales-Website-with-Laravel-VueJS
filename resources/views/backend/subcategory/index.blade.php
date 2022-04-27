@extends('backend.layouts.master')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10 m-2">
        <div class="card mt-5">
            <div class="card-header text-center">
                <!-- <h4 class="h4 ">Add Category</h4> -->
                <h5 class="heading heading-5 strong-600">Manage Subcategories</h5>
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
                            <th scope="col" >Category</th>
                            <th scope="col" >Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subcategories as $subcategory)
                        <tr class="bg-white">
                            <th scope="row" class="category_{{$subcategory->category_id%9}}">
                                <div class="media align-items-center">
                                    
                                    <div class="media-body">
                                        <h6 class="h5 font-weight-normal mb-0">{{$subcategory->category->name}}</h6>
                                    </div>
                                </div>
                            </th>

                            <td scope="row">
                                <div class="media align-items-center">
                                    
                                    <div class="media-body">
                                        <h6 class="h5 font-weight-normal mb-0">{{$subcategory->name}}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a href="{{route('subcategory.edit',['subcategory'=>$subcategory->id])}}"><button type="button" class="btn btn-info " title="Edit"><i class="fa fa-edit"></i></button></a>
                                <button type="button" class="btn btn-danger " title="Delete" data-toggle="modal" data-target="#exampleModal_{{$subcategory->id}}"><i class="fa fa-trash-o"></i></button>
                                <div class="modal fade" id="exampleModal_{{$subcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation :</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sur that you want to delete the {{$subcategory->name}} subcategory ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('del_{{$subcategory->id}}').submit();">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('subcategory.destroy',[$subcategory->id])}}" method="post" id="del_{{$subcategory->id}}" hidden>
                                    @csrf
                                    @method('DELETE')

                                </form>
                            </td>



                        </tr>
                        <tr class="table-divider"></tr>
                        @empty
                        <td>No Subcategory to display</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    th.category_0 h6,th.category_0{
        background-color:#288CFF ;
        color: #adb5bd !important;
    }
    th.category_1 h6,th.category_1{
        background-color:#E8F2FF ;
    }
    th.category_2 h6,th.category_2{
        background-color:#192B3F ;
        color: white !important;
    }
    th.category_3 h6,th.category_3{
        background-color:#FF3B00 ;
        
    }
    th.category_4 h6,th.category_4{
        background-color:#FF0033 ;
        color: #adb5bd !important;
    }
    th.category_5 h6,th.category_5{
        background-color:#43C115 ;
    }
    th.category_6 h6,th.category_6{
        background-color:#73E9EF ;
    }
    th.category_7 h6,th.category_7{
        background-color:#3F87F5 ;
    }
    th.category_8 h6,th.category_8{
        background-color:#288CFF ;
        color: #adb5bd !important;
    }
    th.category_9 h6,th.category_9{
        background-color:#3F87F5 ;
    }
</style>
@endsection