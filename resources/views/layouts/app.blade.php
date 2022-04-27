<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/eu42piq119kwzor8i295utrriyjd1hqwt4rzh1o6u9xxivhw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: '#description_create'
        });
    </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="/admin/assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/admin/assets/vendor/fontawesome/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/admin/assets/css/main.css" rel="stylesheet">
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container-fluid">
                <a href="{{ url('/') }}" class="navbar-brand"><img src="/admin/assets/images/brand/icon.svg" alt="Sweet" width="40" />
                    <strong>Sweet</strong>Market</a>
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Marketplace') }}
                </a> -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Dropdown
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    1
                                </a>
                                <a class="dropdown-item" href="#">
                                    2
                                </a>
                                <a class="dropdown-item" href="#">
                                    3
                                </a>
                            </div>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('advertisement.index')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::user()->avatar)
                                <img src="{{Storage::url(Auth::user()->avatar)}}" alt="" width="30" height="30" class="rounded-circle mr-2">
                                @else
                                <img src="{{asset('man.jpg')}}" alt="" width="30" height="30" class="rounded-circle mr-2">
                                @endif

                                {{ Auth::user()->first_name }}

                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(auth()->user()->isadmin==0)
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('advertisement.index') }}">
                                    My Ads
                                </a>
                                <a class="dropdown-item" href="{{ route('advertisement.create') }}">
                                    Create Ads
                                </a>
                                @else
                                <a class="dropdown-item" href="{{ route('auth') }}">
                                    Dashboard
                                </a>
                                @endif
                                <a class="dropdown-item" href="/message">
                                    Message
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-hover">

            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover" aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarHover">

                <ul class="navbar-nav container">
                    @foreach(App\Models\Category::with('subcategories')->get() as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('category.show',[
                                $category->slug,
                            ])}}" data-toggle="dropdown_remove_dropdown_class_for_clickable_link" aria-haspopup="true" aria-expanded="false">
                            {{$category->name}}
                        </a>

                        <ul class="dropdown-menu">
                            @foreach($category->subcategories as $subcategory)
                            <li>
                                <a class="dropdown-item dropdown-toggle" href="{{route('subcategory.show',['categorySlug'=>$category->slug , 'subcategorySlug'=>$subcategory->slug])}}">{{$subcategory->name}}</a>

                                <ul class="dropdown-menu">
                                    @foreach($subcategory->childcategories as $childcategory)
                                    <li>
                                        <a class="dropdown-item" href="{{route('childcategory.show',[
                                                $category->slug,
                                                $subcategory->slug,
                                                $childcategory->slug,
                                            ])}}">{{$childcategory->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>

                            </li>
                            @endforeach

                        </ul>

                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>




        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <style>
        .li-active {
            background-color: #e9eeff;
            color: #288cff;
            border-radius: 5px;
        }

        .dropdown:hover>.dropdown-menu {
            display: block;
            top: 28px;
        }

        /* hover dropdown menus */
        @media only screen and (max-width: 991px) {
            .navbar-hover .show>.dropdown-toggle::after {
                transform: rotate(-90deg);
            }
        }

        @media only screen and (min-width: 492px) {

            .navbar-hover .collapse ul li {
                position: relative;
            }

            .navbar-hover .collapse ul li:hover>ul {
                display: block
            }

            .navbar-hover .collapse ul ul {
                position: absolute;
                top: 100%;
                left: 0;
                min-width: 150px;
                display: none
            }

            .navbar-hover .collapse ul ul ul {
                position: absolute;
                top: 0;
                left: 100%;
                min-width: 150px;
                display: none
            }
        }

        .sidebar {
            min-height: 500px;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                min-height: 0;
            }

            .sidebar li {
                float: left;
            }

            .sidebar li.g_heading {
                display: none;
            }

            #header-nav-user {
                margin-left: 20px;
                padding: 0;
            }

            #header-nav-user img {
                margin: 0;
                padding: 0;
                float: left;
            }

            #header-nav-user h3 {
                margin: 0;
                padding: 0;
                position: relative;
                top: 2em;
            }

            #header-nav-user p {
                margin: 0;
                padding: 0;
                position: relative;
                top: 3em;
            }

        }

        @media screen and (max-width: 400px) {
            .sidebar li {
                text-align: center;
                float: none;
            }


        }
    </style>




</body>

</html>