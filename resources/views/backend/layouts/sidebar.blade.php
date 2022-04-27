<div class="left_sidebar">
    <nav class="sidebar">
        <div class="user-info">
            @if(!auth()->user()->avatar)
            <div class="image"><a href="{{route('profile.index')}}"><img src="/admin/assets/images/user.png" alt="User"></a></div>
            @else
            <div class="image"><a href="{{route('profile.index')}}"><img src="{{Storage::url(auth()->user()->avatar)}}" alt="User"></a></div>
            @endif
            <div class="detail mt-3">
                <h5 class="mb-0">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h5>
                <small>Admin</small>
            </div>
            <div class="social">
                <a href="javascript:void(0);" title="facebook"><i class="ti-twitter-alt"></i></a>
                <a href="javascript:void(0);" title="twitter"><i class="ti-linkedin"></i></a>
                <a href="javascript:void(0);" title="instagram"><i class="ti-facebook"></i></a>
            </div>
        </div>
        <ul id="main-menu" class="metismenu">
            <li class="g_heading">Main</li>
            <li class="{{Route::currentRouteName()=='auth' ? 'active' :''}}"><a href="/auth"><i class="ti-home"></i><span>Dashboard</span></a></li>
            <li>
                <a href="{{route('category.index')}}" class="has-arrow"><i class="fa fa-bars" aria-hidden="true"></i><span>Category</span></a>
                <ul>
                    <li><a href="{{route('category.index')}}">Manage Categories</a></li>
                    <li><a href="{{route('category.create')}}">Add Category</a></li>

                </ul>
            </li>
            <li>
                <a href="{{route('subcategory.index')}}" class="has-arrow"><i class="fa fa-bars" aria-hidden="true"></i><span>SubCategory</span></a>
                <ul>
                    <li><a href="{{route('subcategory.index')}}">Manage SubCategories</a></li>
                    <li><a href="{{route('subcategory.create')}}">Add SubCategory</a></li>

                </ul>
            </li>
            <li>
                <a href="{{route('childcategory.index')}}" class="has-arrow"><i class="fa fa-bars" aria-hidden="true"></i><span>ChildCategory</span></a>
                <ul>
                    <li><a href="{{route('childcategory.index')}}">Manage ChildCategories</a></li>
                    <li><a href="{{route('childcategory.create')}}">Add ChildCategory</a></li>

                </ul>
            </li>
            <li class="g_heading">Admin</li>

            <li><a  href="{{ route('profile.index') }}">
                    My Profile
                </a></li>

        </ul>
    </nav>
</div>

<div class="right_sidebar">
    <div class="setting_div">
        <a href="javascript:void(0);" class="rightbar_btn"><i class="fa fa-cog fa-spin"></i></a>
    </div>
    <ul class="nav nav-pills nav-fill flex-column flex-sm-row mx-3 my-3" id="myTab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="Settings-tab" data-toggle="tab" href="#Settings" role="tab" aria-controls="Settings" aria-selected="true">Settings</a></li>
        <li class="nav-item"><a class="nav-link" id="Contact-tab" data-toggle="tab" href="#Contact" role="tab" aria-controls="Contact" aria-selected="false">Contact</a></li>
    </ul>
    <hr>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
            <div class="sidebar-scroll">
                <div class="sidebar-widget px-3">
                    <h5>Theme Setting</h5>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="black">
                            <div class="black"></div>
                        </li>
                        <li data-theme="azure">
                            <div class="azure"></div>
                        </li>
                        <li data-theme="indigo" class="active">
                            <div class="indigo"></div>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                        </li>
                    </ul>
                    <ul class="setting-list list-unstyled mt-3">
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Dark Sidebar</span>
                                <label class="toggle-switch switch-sm mb-0">
                                    <input type="checkbox" class="switch-dark">
                                    <span class="toggle-switch-slider"></span>
                                </label>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Mini Sidebar</span>
                                <label class="toggle-switch switch-sm mb-0">
                                    <input type="checkbox" class="switch-sidebar">
                                    <span class="toggle-switch-slider"></span>
                                </label>
                            </label>
                        </li>
                    </ul>
                    <hr>
                </div>

            </div>
        </div>
        <div class="tab-pane" id="Contact" role="tabpanel" aria-labelledby="Contact-tab">
            <div class="sidebar-widget px-3">
                <ul class="list-unstyled contact-list">
                    <li class="d-flex align-items-center">
                        <span class="contact-img">
                            <img src="/admin/assets/images/xs/avatar1.jpg" class="rounded" alt="">
                        </span>
                        <h4 class="contact-name">Vincent Porter <span class="d-block">London UK</span></h4>
                        <div class="action">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fab fa-skype"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope"></i></a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="contact-img">
                            <img src="/admin/assets/images/xs/avatar2.jpg" class="rounded" alt="">
                        </span>
                        <h4 class="contact-name">Mike Thomas <span class="d-block">London UK</span></h4>
                        <div class="action">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fab fa-skype"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope"></i></a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="contact-img">
                            <img src="/admin/assets/images/xs/avatar3.jpg" class="rounded" alt="">
                        </span>
                        <h4 class="contact-name">Aiden Chavaz</h4>
                        <div class="action">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fab fa-skype"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope"></i></a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="contact-img">
                            <img src="/admin/assets/images/xs/avatar4.jpg" class="rounded" alt="">
                        </span>
                        <h4 class="contact-name">Vincent Porter <span class="d-block">Miami USA</span></h4>
                        <div class="action">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fab fa-skype"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope"></i></a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="contact-img">
                            <img src="/admin/assets/images/xs/avatar5.jpg" class="rounded" alt="">
                        </span>
                        <h4 class="contact-name">Mike Thomas <span class="d-block">Neyyork USA</span></h4>
                        <div class="action">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fab fa-skype"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope"></i></a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="contact-img">
                            <img src="/admin/assets/images/xs/avatar6.jpg" class="rounded" alt="">
                        </span>
                        <h4 class="contact-name">Aiden Chavaz</h4>
                        <div class="action">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fab fa-skype"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope"></i></a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="contact-img">
                            <img src="/admin/assets/images/xs/avatar7.jpg" class="rounded" alt="">
                        </span>
                        <h4 class="contact-name">Mike Thomas <span class="d-block">New Delhi IND</span></h4>
                        <div class="action">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fab fa-skype"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope"></i></a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="contact-img">
                            <img src="/admin/assets/images/xs/avatar8.jpg" class="rounded" alt="">
                        </span>
                        <h4 class="contact-name">Aiden Chavaz</h4>
                        <div class="action">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fab fa-skype"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>