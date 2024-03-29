<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
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

                    {{-- Dashboard --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                            <i class="uim uim-airplay"></i> <b>Dashboard</b>
                        </a>
                    </li>

                    {{-- Commissioner --}}
                    @if(Auth::user()->role == 6)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Application Status <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/admin_new_business_noc_list',6) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/admin_renew_business_noc_list',6) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/admin_new_hospital_noc_list',6) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/admin_renew_hospital_noc_list',6) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/admin_provisional_building_noc_list',6) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/admin_final_building_noc_list',6) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Approved Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',1) }}"  class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',1) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',1) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',1) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',1) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',1) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Rejected Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',2) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',2) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',2) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',2) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',2) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',2) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    {{-- Additional Commissioner --}}
                    @elseif(Auth::user()->role == 5)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Application Status <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/admin_new_business_noc_list',6) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/admin_renew_business_noc_list',6) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/admin_new_hospital_noc_list',6) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/admin_renew_hospital_noc_list',6) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/admin_provisional_building_noc_list',6) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/admin_final_building_noc_list',6) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Approved Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',1) }}"  class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',1) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',1) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',1) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',1) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',1) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Rejected Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',2) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',2) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',2) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',2) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',2) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',2) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    {{-- DMC --}}
                    @elseif(Auth::user()->role == 4)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Application Status <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/admin_new_business_noc_list',6) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/admin_renew_business_noc_list',6) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/admin_new_hospital_noc_list',6) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/admin_renew_hospital_noc_list',6) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/admin_provisional_building_noc_list',6) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/admin_final_building_noc_list',6) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Approved Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',1) }}"  class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',1) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',1) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',1) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',1) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',1) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Rejected Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',2) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',2) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',2) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',2) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',2) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',2) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    {{-- Chief Fire Officer --}}
                    @elseif(Auth::user()->role == 3)

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i class="uim uim-layer-group"></i> <b>Master</b> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="{{ url('/business') }}" id="topnav-form" role="button">
                                    Business
                                </a>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="{{ url('/signature') }}" id="topnav-form" role="button">
                                    Signature
                                </a>
                            </div>

                            {{-- <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button">
                                    NOC Fees Chart <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="{{ url('/fees_construction') }}"  class="dropdown-item">Construction Type</a>
                                    <a href="{{ url('/fees_mode_operate') }}"  class="dropdown-item">Mode Of Operations</a>
                                    <a href="{{ url('/fees_bldg_ht') }}"  class="dropdown-item">Building Height / Type </a>
                                    <a href="{{ url('/fees_category') }}"  class="dropdown-item">Construction Category</a>
                                    <a href="{{ url('/fees_master') }}"  class="dropdown-item">NOC Fees</a>
                                </div>
                            </div> --}}

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> <b>All Reviewed Application</b> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/admin_new_business_noc_list',6) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/admin_renew_business_noc_list',6) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/admin_new_hospital_noc_list',6) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/admin_renew_hospital_noc_list',6) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/admin_provisional_building_noc_list',6) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/admin_final_building_noc_list',6) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> <b>Approved Application</b> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',3) }}"  class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',3) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',3) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',3) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',3) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',3) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> <b>Rejected Application</b> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',4) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',4) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',4) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',4) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',4) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',4) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>


                    {{-- Checker Maker --}}
                    @elseif(Auth::user()->role == 2)

                    {{-- Unpaid Application List --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Unpaid Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/admin_new_business_noc_list',1) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/admin_renew_business_noc_list',1) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/admin_new_hospital_noc_list',1) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/admin_renew_hospital_noc_list',1) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/admin_provisional_building_noc_list',1) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/admin_final_building_noc_list',1) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- Invoice Application List --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> All Generated Invoice List <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/admin_new_business_noc_list',7) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/admin_renew_business_noc_list',7) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/admin_new_hospital_noc_list',7) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/admin_renew_hospital_noc_list',7) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/admin_provisional_building_noc_list',7) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/admin_final_building_noc_list',7) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i class="uim uim-layer-group"></i> <b>All Application status</b> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button">
                                    <b>Paid Application List</b>  <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{ url('/admin_new_business_noc_list',2) }}" class="dropdown-item">New Business NOC List</a>
                                    <a href="{{ url('/admin_renew_business_noc_list',2) }}" class="dropdown-item">Renew Business NOC List</a>
                                    <a href="{{ url('/admin_new_hospital_noc_list',2) }}" class="dropdown-item">New Hospital NOC List</a>
                                    <a href="{{ url('/admin_renew_hospital_noc_list',2) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                    <a href="{{ url('/admin_provisional_building_noc_list',2) }}" class="dropdown-item">Provisional Building NOC List</a>
                                    <a href="{{ url('/admin_final_building_noc_list',2) }}" class="dropdown-item">Final Building NOC List</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button">
                                    <b>Approved Application List</b>  <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{ url('/all_new_business_noc_list',1) }}"  class="dropdown-item">New Business NOC List</a>
                                    <a href="{{ url('/all_renew_business_noc_list',1) }}" class="dropdown-item">Renew Business NOC List</a>
                                    <a href="{{ url('/all_new_hospital_noc_list',1) }}" class="dropdown-item">New Hospital NOC List</a>
                                    <a href="{{ url('/all_renew_hospital_noc_list',1) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                    <a href="{{ url('/all_provisional_building_noc_list',1) }}" class="dropdown-item">Provisional Building NOC List</a>
                                    <a href="{{ url('/all_final_building_noc_list',1) }}" class="dropdown-item">Final Building NOC List</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button">
                                    <b>Rejected Application List</b>  <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{ url('/all_new_business_noc_list',2) }}" class="dropdown-item">New Business NOC List</a>
                                    <a href="{{ url('/all_renew_business_noc_list',2) }}" class="dropdown-item">Renew Business NOC List</a>
                                    <a href="{{ url('/all_new_hospital_noc_list',2) }}" class="dropdown-item">New Hospital NOC List</a>
                                    <a href="{{ url('/all_renew_hospital_noc_list',2) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                    <a href="{{ url('/all_provisional_building_noc_list',2) }}" class="dropdown-item">Provisional Building NOC List</a>
                                    <a href="{{ url('/all_final_building_noc_list',2) }}" class="dropdown-item">Final Building NOC List</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- Field Inspector --}}
                    @elseif(Auth::user()->role == 1)
                    {{-- Underprocess Application --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Application Status <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/admin_new_business_noc_list',5) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/admin_renew_business_noc_list',5) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/admin_new_hospital_noc_list',5) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/admin_renew_hospital_noc_list',5) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/admin_provisional_building_noc_list',5) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/admin_final_building_noc_list',5) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Approved Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',1) }}"  class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',1) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',1) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',1) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',1) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',1) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Rejected Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',2) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',2) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',2) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',2) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',2) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',2) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    {{-- Operator --}}
                    @elseif(Auth::user()->role == 0)
                    {{-- New Application --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Application Status <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/admin_new_business_noc_list',0) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/admin_renew_business_noc_list',0) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/admin_new_hospital_noc_list',0) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/admin_renew_hospital_noc_list',0) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/admin_provisional_building_noc_list',0) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/admin_final_building_noc_list',0) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Approved Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',1) }}"  class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',1) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',1) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',1) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',1) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',1) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-grid"></i> Rejected Application <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div>
                                        <a href="{{ url('/all_new_business_noc_list',2) }}" class="dropdown-item">New Business NOC List</a>
                                        <a href="{{ url('/all_renew_business_noc_list',2) }}" class="dropdown-item">Renew Business NOC List</a>
                                        <a href="{{ url('/all_new_hospital_noc_list',2) }}" class="dropdown-item">New Hospital NOC List</a>
                                        <a href="{{ url('/all_renew_hospital_noc_list',2) }}" class="dropdown-item">Renew Hospital NOC List</a>
                                        <a href="{{ url('/all_provisional_building_noc_list',2) }}" class="dropdown-item">Provisional Building NOC List</a>
                                        <a href="{{ url('/all_final_building_noc_list',2) }}" class="dropdown-item">Final Building NOC List</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>
                    @endif

                </ul>



            </div>

        </nav>
    </div>
</div>
