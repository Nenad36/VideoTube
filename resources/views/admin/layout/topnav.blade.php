<!-- Loader -->
{{--<div id="preloader"><div id="status"><div class="spinner"></div></div></div>--}}
<div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo-->
            <div class="d-block d-lg-none mr-5">

                <a href="{{ url('/home') }}" class="logo">
                    <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="28" class="logo-small">
                </a>

            </div>
            <!-- End Logo-->

            <div class="menu-extras topbar-custom navbar p-0">

                <ul class="list-inline ml-auto mb-0">

                      <!-- Authentication Links -->
                        @guest
                        <ul class="list-inline flags-dropdown d-none d-lg-block mb-0">
                            <li class="list-inline-item text-white-50 mr-3">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="list-inline-item text-white-50 mr-3">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </ul>
                        @else

                    <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('admin/assets/images/users/avatar-6.jpg') }}" alt="user" class="rounded-circle">
                                <span class="d-none d-md-inline-block ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                            </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">

                            @auth
                              <a class="dropdown-item" href="{{ route('channels.show', auth()->user()->channel->id) }}">
                              <i class="dripicons-wallet text-muted"></i>My Channel </a>
                            @endauth

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} <i class="dripicons-exit text-muted"></i> </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                          </li>

                        @endguest



                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>

            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <!-- Logo-->
            <div class="d-none d-lg-block">
                <!-- Text Logo
                <a href="index.html" class="logo">
                    Foxia
                </a>
                 -->
                <!-- Image Logo -->
                <a href="index.html" class="logo">
                    <!-- <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-small"> -->
                    <img src="{{ asset('admin/assets/images/logo.png') }}" alt="" height="20" class="logo-large">
                </a>

            </div>
            <!-- End Logo-->
            <div id="navigation">

                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ url('/') }}"><i class="dripicons-meter"></i>Fronend</a>
                    </li>

                    <li class="has-submenu">
                        <a href="{{ url('/home') }}"><i class="dripicons-view-thumb"></i>Dashboard</a>
                    </li>


                    <li class="has-submenu">
                        <a href="{{ route('channels.show', auth()->user()->channel->id) }}"><i class="dripicons-view-thumb"></i>My Channel</a>
                    </li>

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
    <!-- End Navigation Bar-->
</div>

