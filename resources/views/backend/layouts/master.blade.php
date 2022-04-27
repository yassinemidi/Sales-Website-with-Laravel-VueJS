@include('backend.layouts.header')
@include('backend.layouts.sidebar')

    <div class="page" >
        <div style="min-height: 45em;">
        @yield('content')
        </div>
        
        <footer class="px-3 footer bg-white">
            <div class="container ">
                <div class="row align-items-center py-3 border-top">
                    <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                        © 2019 <a href="https://themeforest.net/user/wrraptheme/portfolio" target="_blank">SweetAds</a>. All rights reserved.
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <ul class="nav justify-content-center justify-content-lg-end">
                            <li class="nav-item">Designed By Yassine MIDI</li>
                            <li class="nav-item"><a class="nav-link" href="https://dribbble.com/thememakker" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/thememakker/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/thememakkerteam" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@include('backend.layouts.footer')