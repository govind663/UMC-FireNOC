<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
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

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/citizen/dashboard') }}">
                            <i class="uim uim-airplay"></i> <b>Dashboard</b>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i class="uim uim-layer-group"></i> <b>All Application Status</b> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button">
                                    <b>Pending Application List</b>  <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{ url('/new_business_noc_list',0) }}" class="dropdown-item"><b>New Business NOC List</b></a>
                                    <a href="{{ url('/renew_business_noc_list',0) }}" class="dropdown-item"><b>Renew Business NOC List</b></a>
                                    <a href="{{ url('/new_hospital_noc_list',0) }}" class="dropdown-item"><b>New Hospital NOC List</b></a>
                                    <a href="{{ url('/renew_hospital_noc_list',0) }}" class="dropdown-item"><b>Renew Hospital NOC List</b></a>
                                    <a href="{{ url('/provisional_building_noc_list',0) }}" class="dropdown-item"><b>Provisional Building NOC List</b></a>
                                    <a href="{{ url('/final_building_noc_list',0) }}" class="dropdown-item"><b>Final Building NOC List</b></a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button">
                                    <b>Underprocess Application List</b> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="{{ url('/new_business_noc_list',5) }}" class="dropdown-item"><b>New Business NOC List</b></a>
                                    <a href="{{ url('/renew_business_noc_list',5) }}" class="dropdown-item"><b>Renew Business NOC List</b></a>
                                    <a href="{{ url('/new_hospital_noc_list',5) }}" class="dropdown-item"><b>New Hospital NOC List</b></a>
                                    <a href="{{ url('/renew_hospital_noc_list',5) }}" class="dropdown-item"><b>Renew Hospital NOC List</b></a>
                                    <a href="{{ url('/provisional_building_noc_list',5) }}" class="dropdown-item"><b>Provisional Building NOC List</b></a>
                                    <a href="{{ url('/final_building_noc_list',5) }}" class="dropdown-item"><b>Final Building NOC List</b></a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button">
                                    <b>Unpaid Application List</b> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="{{ url('/new_business_noc_list',1) }}" class="dropdown-item"><b>New Business NOC List</b></a>
                                    <a href="{{ url('/renew_business_noc_list',1) }}" class="dropdown-item"><b>Renew Business NOC List</b></a>
                                    <a href="{{ url('/new_hospital_noc_list',1) }}" class="dropdown-item"><b>New Hospital NOC List</b></a>
                                    <a href="{{ url('/renew_hospital_noc_list',1) }}" class="dropdown-item"><b>Renew Hospital NOC List</b></a>
                                    <a href="{{ url('/provisional_building_noc_list',1) }}" class="dropdown-item"><b>Provisional Building NOC List</b></a>
                                    <a href="{{ url('/final_building_noc_list',1) }}" class="dropdown-item"><b>Final Building NOC List</b></a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button">
                                    <b>Paid Application List</b> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="{{ url('/new_business_noc_list',2) }}" class="dropdown-item"><b>New Business NOC List</b></a>
                                    <a href="{{ url('/renew_business_noc_list',2) }}" class="dropdown-item"><b>Renew Business NOC List</b></a>
                                    <a href="{{ url('/new_hospital_noc_list',2) }}" class="dropdown-item"><b>New Hospital NOC List</b></a>
                                    <a href="{{ url('/renew_hospital_noc_list',2) }}" class="dropdown-item"><b>Renew Hospital NOC List</b></a>
                                    <a href="{{ url('/provisional_building_noc_list',2) }}" class="dropdown-item"><b>Provisional Building NOC List</b></a>
                                    <a href="{{ url('/final_building_noc_list',2) }}" class="dropdown-item"><b>Final Building NOC List</b></a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button">
                                    <b>Reviewed Application List</b> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="{{ url('/new_business_noc_list',6) }}" class="dropdown-item"><b>New Business NOC List</b></a>
                                    <a href="{{ url('/renew_business_noc_list',6) }}" class="dropdown-item"><b>Renew Business NOC List</b></a>
                                    <a href="{{ url('/new_hospital_noc_list',6) }}" class="dropdown-item"><b>New Hospital NOC List</b></a>
                                    <a href="{{ url('/renew_hospital_noc_list',6) }}" class="dropdown-item"><b>Renew Hospital NOC List</b></a>
                                    <a href="{{ url('/provisional_building_noc_list',6) }}" class="dropdown-item"><b>Provisional Building NOC List</b></a>
                                    <a href="{{ url('/final_building_noc_list',6) }}" class="dropdown-item"><b>Final Building NOC List</b></a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button">
                                    <b>Approved Application List</b> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="{{ url('/new_business_noc_list',3) }}" class="dropdown-item"><b>New Business NOC List</b></a>
                                    <a href="{{ url('/renew_business_noc_list',3) }}" class="dropdown-item"><b>Renew Business NOC List</b></a>
                                    <a href="{{ url('/new_hospital_noc_list',3) }}" class="dropdown-item"><b>New Hospital NOC List</b></a>
                                    <a href="{{ url('/renew_hospital_noc_list',3) }}" class="dropdown-item"><b>Renew Hospital NOC List</b></a>
                                    <a href="{{ url('/provisional_building_noc_list',3) }}" class="dropdown-item"><b>Provisional Building NOC List</b></a>
                                    <a href="{{ url('/final_building_noc_list',3) }}" class="dropdown-item"><b>Final Building NOC List</b></a>
                                </div>
                            </div>


                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button">
                                    <b>Rejected Application List</b> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="{{ url('/new_business_noc_list',4) }}" class="dropdown-item"><b>New Business NOC List</b></a>
                                    <a href="{{ url('/renew_business_noc_list',4) }}" class="dropdown-item"><b>Renew Business NOC List</b></a>
                                    <a href="{{ url('/new_hospital_noc_list',4) }}" class="dropdown-item"><b>New Hospital NOC List</b></a>
                                    <a href="{{ url('/renew_hospital_noc_list',4) }}" class="dropdown-item"><b>Renew Hospital NOC List</b></a>
                                    <a href="{{ url('/provisional_building_noc_list',4) }}" class="dropdown-item"><b>Provisional Building NOC List</b></a>
                                    <a href="{{ url('/final_building_noc_list',4) }}" class="dropdown-item"><b>Final Building NOC List</b></a>
                                </div>
                            </div>

                        </div>
                    </li>

                </ul>

            </div>

        </nav>
    </div>
</div>
