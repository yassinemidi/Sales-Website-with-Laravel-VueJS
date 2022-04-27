@extends('layouts.app')
@section('content')







<div class="container-fluid">
    <div class="row ">
        <div class="col-md-3">
            <!-- Sidebar -->
            @include('layouts.sidebar')
        </div>
        
        <div class="col-md-9">
            @if(session('msg') || request()->get('verified')=='1')
            <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                <span class="alert-inner--icon"><i class="fa fa-check"></i></span>
                <span class="alert-inner--text"><strong>Success!</strong> {{session('msg')}} {{request()->get('verified')=='1'? 'Email has been verified.':''}}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row">



                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header bg-warning">
                            Update profile
                        </div>
                        <div class="card-body">
                            @if(session('msgprofile'))
                            <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                                <span class="alert-inner--icon"><i class="fa fa-check"></i></span>
                                <span class="alert-inner--text"><strong>Success!</strong> {{session('msgprofile')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="card">




                                <div class="body">
                                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-group">
                                            <label for="first_name">First name</label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{auth()->user()->first_name}}">
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last name</label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{auth()->user()->last_name}}">
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{auth()->user()->username}}">
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{auth()->user()->email}}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{auth()->user()->address}}">
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="avatar">avatar</label>
                                            <image-edit-profile />
                                            @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <button type="submit" class="btn btn-warning float-right">Update profile</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            Change password
                        </div>
                        <div class="card-body">
                            @if (session('status')=="password-updated")
                            <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                                <span class="alert-inner--icon"><i class="fa fa-check"></i></span>
                                <span class="alert-inner--text"><strong>Success!</strong> Password has been updated.</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="body">
                                <form action="{{route('user-password.update')}}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
                                        @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>*{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>*{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>*{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-danger float-right">Update password</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>







@endsection