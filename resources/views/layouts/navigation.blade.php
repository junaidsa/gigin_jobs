<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;"> <i class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown"> <i class="bx bx-bell vertical-align-middle"></i>
                        <span class="msg-count">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <h6 class="msg-header-title">1 New</h6>
                                <p class="msg-header-subtitle">Application Notifications</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-right">14 Sec
                                                ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Notifications</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                <p class="designattion mb-0">Available</p>
                            </div>
                            <img src="{{ asset('assets/images/icons/user.png')}}" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="{{route('profile.edit')}}"><i
                                class="bx bx-user"></i><span>Profile</span></a>
                        <a class="dropdown-item" href="{{route('dashboard')}}"><i
                                class="bx bx-tachometer"></i><span>Dashboard</span></a>
                        <div class="dropdown-divider mb-0"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link class="dropdown-item" :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i
                                    class="bx bx-power-off"></i> <span> {{ __('Log Out') }} </span>
                            </x-dropdown-link>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>