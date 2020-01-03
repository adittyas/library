<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="{{ asset('images/icons/logo.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                    aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg
">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="{{ route('index.profile') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    {{-- <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    <form action="{{ route('logout') }}" method="post" id='logout-form' style='display: none;'>
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="{{ asset('images/icons/logo.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} "
                        href=" {{ route('index.dashboard') }}"> <i class="ni ni-tv-2 text-primary"></i>
                        {{ __('Dashboard') }}
                    </a>
                </li>
                @role('master')
                <li class="nav-item {{ Request::is('master') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('master') ? 'active' : '' }}" href=" {{ route('index.master') }}">
                        <i class="ni ni-single-02 text-primary"></i>
                        {{ __('Master') }}
                    </a>
                </li>
                @endrole
                {{-- <li class="nav-item {{ Request::is('catalog') ? 'active' : '' }}">
                <a class=" nav-link {{ Request::is('catalog') ? 'active' : '' }}" href="{{ route('index.catalog') }}">
                    <i class="ni ni-archive-2 text-primary"></i>
                    {{ __('Catalog') }}
                </a>
                </li> --}}
                @role('admin')
                <li class="nav-item {{ Request::is('guest') ? 'active' : '' }}">
                    <a class=" nav-link {{ Request::is('guest') ? 'active' : '' }}" href="{{ route('index.guest') }}">
                        <i class="ni ni-user-run text-primary"></i>
                        {{ __('Guest') }}
                    </a>
                </li>
                @endrole
            </ul>
            @role('admin')
            <!-- Divider -->
            <hr class="my-2">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">{{ __('transaction') }}</h6>
            <!-- Navigation -->
            <ul class="navbar-nav ">
                <li class="nav-item {{ Request::is('booking') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('booking') ? 'active' : '' }}"
                        href="{{ route('index.booking') }}">
                        <i class="ni ni-collection text-yellow"></i>{{ __('Booking') }}
                    </a>
                </li>
                {{-- <li class="nav-item {{ Request::is('return') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('return') ? 'active' : '' }}" href="{{ route('index.return') }}">
                    <i class="ni ni-curved-next text-yellow"></i>{{ __('Return') }}
                </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-yellow"></i>{{ __('Member') }}
                </a>
                </li> --}}
            </ul>
            <!-- Divider -->
            <hr class="my-2">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Master Data</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item {{ Request::is('book') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('book') ? 'active' : '' }}" href="{{ route('index.book') }}">
                        <i class="ni ni-books text-info"></i>{{ __('Book') }}
                    </a>
                </li>
                {{-- <li class="nav-item {{ Request::is('publisher') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('publisher') ? 'active' : '' }}"
                    href="{{ route('index.publisher') }}">
                    <i class="ni ni-building text-info"></i>{{ __('Publisher') }}
                </a>
                </li> --}}
                <li class="nav-item {{ Request::is('member') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('member') ? 'active' : '' }}" href="{{ route('index.member') }}">
                        <i class="ni ni-badge text-info"></i>{{ __('Member') }}
                    </a>
                </li>
            </ul>
            @endrole
        </div>
    </div>
</nav>
