<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            @if (auth()->guard('citizen'))
            <div class="navbar-brand-box">
                <a href="{{ url('/citizen/dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="150">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="150">
                    </span>
                </a>

                <a href="{{ url('/citizen/dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="150">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="150">
                    </span>
                </a>
            </div>
            @else
            <div class="navbar-brand-box">
                <a href="{{ url('/admin/dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="150">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="150">
                    </span>
                </a>

                <a href="{{ url('/admin/dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="150">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="150">
                    </span>
                </a>
            </div>
            @endif

            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- start page title -->
            <div class="page-title-box align-self-center d-none d-md-block">
                <h4 class="page-title mb-0">UMC - Fire NOC Application</h4>
            </div>
            <!-- end page title -->

        </div>

        <div class="d-flex">
            {{-- Start Fullscreen --}}
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            @if (auth()->guard('citizen'))
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user avatar-sm" src="{{ url('/') }}/assets/logo/favicon.ico" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->f_name }} {{ Auth::user()->m_name }} {{ Auth::user()->l_name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#">
                        <span class="align-middle">{{ Auth::user()->email }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/citizen/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-user text-muted font-size-16 align-middle me-1"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ url('/citizen/logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @else
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user avatar-sm" src="{{ url('/') }}/assets/logo/favicon.ico" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#">
                        <span class="align-middle">{{ Auth::user()->email }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-user text-muted font-size-16 align-middle me-1"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @endif


            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="ri-settings-2-line"></i>
                </button>
            </div> --}}

        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                @if (auth()->guard('citizen'))

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/citizen/dashboard') }}">
                            <i class="uim uim-airplay"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> All Application Status <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('#') }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Unpaid Application Status <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('#') }}" class="dropdown-item">All New Business NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All Renew Business NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All New Hospital NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All Renew Hospital NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All Provisional Building NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Paid Application Status <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('#') }}" class="dropdown-item">All New Business NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All Renew Business NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All New Hospital NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All Renew Hospital NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All Provisional Building NOC List</a>
                                        <a href="{{ url('#') }}" class="dropdown-item">All Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                </ul>
                @else
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                            <i class="uim uim-airplay"></i> Dashboard
                        </a>
                    </li>

                </ul>
                @endif
            </div>

        </nav>
    </div>
</div>
