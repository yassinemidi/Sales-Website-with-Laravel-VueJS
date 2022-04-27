<div class="card sidebar" style="position: sticky;top: 0;">
    <div class="card-body " id="header-nav-user">
        <div class="row">
            <div class="col-4 justify-content-center">
                @if(!auth()->user()->avatar)
                <img src="\man.jpg" class="rounded-circle " width="90" height="90">


                @else
                <img src="{{Storage::url(auth()->user()->avatar)}}" class="rounded-circle ml-0" width="90" height="90">

                @endif
            </div>
            <div class="col-8">
                <p class="text-muted text-center ">Utilisateur</p>
                <h3 class="h4 text-center mt-2 d-block">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h3>
                
                
                <a href="{{route('profile.deleteAvatar')}}" class="d-block text-center ">Delete your photo</a>
       
            </div>
        </div>





    </div>

    <hr >



    <ul id="main-menu" class="metismenu sidebar d-block">
        <li class="g_heading">Main</li>
        <li><a href="#"><i class="fas fa-chart-line"></i><span>Dashboard</span></a></li>
        <li class="{{request()->is('profile')? 'li-active':''}}"><a href="{{route('profile.index')}}"><i class="fas fa-user-alt"></i><span>Profile</span></a></li>
        <li class="g_heading">Advertisement</li>
        <li class="{{request()->is('advertisement/create')? 'li-active':''}}"><a href="{{route('advertisement.create')}}"><i class="fas fa-headset"></i><span>Create Ads</span></a></li>
        <li class="{{request()->is('advertisement')? 'li-active':''}}"><a href="{{route('advertisement.index')}}"><i class="fas fa-headset"></i><span>Manage My Ads</span></a></li>
        <li><a href="{{route('advertisement.index')}}"><i class="fas fa-upload"></i><span>Published Ads</span></a></li>
        <li><a href="#"><i class="fas fa-lock"></i><span>Pending Ads</span></a></li>
        <li class="g_heading">Chat</li>
        <li><a href="/message"><i class="fas fa-inbox"></i><span>Message</span></a></li>
    </ul>

</div>


<!--  -->

<!--  -->