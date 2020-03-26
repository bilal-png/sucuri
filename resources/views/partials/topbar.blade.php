
 <div class="topbar">
        <div class="container-fluid">
            <div class="row">
                <div  class="col-xs-12 col-md-2">
                    <div class="logo" >
				        <a href="/admin/home"><img src="{{ asset("images/bd-logo-white.png") }}" alt="BlockDos" > <!-- <h3 style="color:White"> -->  </a>
                       
                    </div>
                </div>
                <div class="col-xs-12 col-md-2">
                    <h4 style="margin-left: 25px; font-size: 18px !important; font-weight: 600;">Dashboard</h4>
                </div>
                <div class="col-xs-12 col-md-8">
                    <div class="topbar-links">
                        <ul class="list-unstyled topnav-menu float-right mb-0">
                            {{-- <li style="width: 200px;">
                                <form class="app-search">
                                    <div class="app-search-box " style="border: 1px solid black; background: white; border-radius: 30px;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search..."  style="background: white; border-radius: 30px; padding: 10px;">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" style="color: black">
                                                    <i class="fe-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li> --}}
                            {{-- <li style= "margin-top: 30px;"><a href="{{ url('logout') }}">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="title">@lang('global.app_logout')</span>
                            </li> --}}
                            <li class="dropdown notification-list">
                                <a style="color: black" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fe-bell noti-icon" style="font-size: 20px !important;"></i>
                                    <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-lg">
        
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-right">
                                                <a href="#" style="color: black" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                                        </h5>
                                    </div>
        
                                    <div class="slimscroll noti-scroll">
        
                                        <!-- item-->
                                        <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item active">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Cristina Pride</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Hi, How are you? What about our next meeting</small>
                                            </p>
                                        </a>
        
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item" style="color: black">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">1 min ago</small>
                                            </p>
                                        </a>
        
                                        <!-- item-->
                                        <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Karen Robinson</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Wow ! this admin looks good and awesome design</small>
                                            </p>
                                        </a>
        
                                        <!-- item-->
                                        <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                            <p class="notify-details">New user registered.
                                                <small class="text-muted">5 hours ago</small>
                                            </p>
                                        </a>
        
                                        <!-- item-->
                                        <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">4 days ago</small>
                                            </p>
                                        </a>
        
                                        <!-- item-->
                                        <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-secondary">
                                                <i class="mdi mdi-heart"></i>
                                            </div>
                                            <p class="notify-details">Carlos Crouch liked
                                                <b>Admin</b>
                                                <small class="text-muted">13 days ago</small>
                                            </p>
                                        </a>
                                    </div>
        
                                    <!-- All-->
                                    <a href="javascript:void(0);" style="color: black" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all
                                        <i class="fi-arrow-right"></i>
                                    </a>
        
                                </div>
                            </li>
        
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user mr-0"  style="color: black"data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    
                                    <span class="pro-user-name ml-1">
                                        Nowak
                                         {{-- <i class="mdi mdi-chevron-down"></i>  --}}
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
                                    <br>
                                    <!-- item-->
                                    <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                        <i class="fe-user"></i>
                                        <span>My Account</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                        <i class="fe-settings"></i>
                                        <span>Settings</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                        <i class="fe-lock"></i>
                                        <span>Lock Screen</span>
                                    </a>
        
                                    <div class="dropdown-divider"></div>
        
                                    <!-- item-->
                                    <a href="{{ url('logout') }}" style="color: black" class="dropdown-item notify-item">
                                        <i class="fe-log-out"></i>
                                        <span>Logout</span>
                                    </a>
        
                                </div>
                            </li>
        
                            <li class="dropdown notification-list">
                                <a style="color: black" href="javascript:void(0);" class="nav-link right-bar-toggle">
                                    <i class="fe-settings noti-icon" style="font-size: 20px !important;"></i>
                                </a>
                            </li>
        
        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
