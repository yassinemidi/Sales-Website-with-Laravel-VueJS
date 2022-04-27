<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Webpixels">
    <link rel="icon" href="/admin/assets/images/brand/icon.svg" type="image/x-icon">
    <title>SweetAds</title>

    <link rel="stylesheet" href="/admin/assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/admin/assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="/admin/assets/vendor/charts-c3/plugin.css" />
    <link rel="stylesheet" href="/admin/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" href="/admin/assets/css/main.css" type="text/css">

</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="/admin/assets/images/brand/icon_black.svg" width="48" height="48" alt="ArrOw">
            </div>
            <p>Please wait...</p>
        </div>
    </div>

    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <a href="/" class="navbar-brand"><img src="/admin/assets/images/brand/icon.svg" alt="BigBucket" />
                <strong>Sweet</strong> ads</a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li> -->
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">



                    <li class="nav-item ">
                        <a class="nav-link nav-link-icon" href="{{route('profile.index')}}">{{auth()->user()->first_name}}</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">User menu</h6>
                            <a class="dropdown-item" href="{{route('profile.index')}}"><i class="fa fa-user text-primary"></i>My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-briefcase text-primary"></i>My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-envelope text-primary"></i>Inbox</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-cog text-primary"></i>Settings</a>
                            <div class="dropdown-divider" role="presentation"></div>
                            
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out text-primary"></i>Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main_content" id="main-content">