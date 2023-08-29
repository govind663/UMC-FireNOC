<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="180">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="180">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="180">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/') }}/assets/logo/logo_white.png" alt="UMC-firenoc" height="80" width="180">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ri-menu-2-line align-middle"></i>
            </button>


        </div>

        <div class="d-flex">
             {{-- Start Fullscreen --}}
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>


            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user avatar-sm" src="{{ url('/') }}/assets/logo/favicon.ico"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#">
                        <span class="align-middle">{{ Auth::user()->email }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-user text-muted font-size-16 align-middle me-1"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
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
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                            <i class="uim uim-airplay"></i> Dashboard
                        </a>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="uim uim-layer-group"></i> UI Elements <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                            aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-alerts.html" class="dropdown-item">Alerts</a>
                                        <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                        <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                        <a href="ui-carousel.html" class="dropdown-item">Carousel</a>
                                        <a href="ui-dropdowns.html" class="dropdown-item">Dropdowns</a>
                                        <a href="ui-grid.html" class="dropdown-item">Grid</a>
                                        <a href="ui-images.html" class="dropdown-item">Images</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-lightbox.html" class="dropdown-item">Lightbox</a>
                                        <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                        <a href="ui-offcanvas.html" class="dropdown-item">Offcanvas</a>
                                        <a href="ui-rangeslider.html" class="dropdown-item">Range Slider</a>
                                        <a href="ui-roundslider.html" class="dropdown-item">Round slider</a>
                                        <a href="ui-session-timeout.html" class="dropdown-item">Session Timeout</a>
                                        <a href="ui-progressbars.html" class="dropdown-item">Progress Bars</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-sweet-alert.html" class="dropdown-item">Sweetalert 2</a>
                                        <a href="ui-tabs-accordions.html" class="dropdown-item">Tabs & Accordions</a>
                                        <a href="ui-typography.html" class="dropdown-item">Typography</a>
                                        <a href="ui-video.html" class="dropdown-item">Video</a>
                                        <a href="ui-general.html" class="dropdown-item">General</a>
                                        <a href="ui-rating.html" class="dropdown-item">Rating</a>
                                        <a href="ui-notifications.html" class="dropdown-item">Notifications</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                        >
                        <i class="uim uim-comment-message"></i> Apps <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                    role="button">
                                    Email <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="email-inbox.html" class="dropdown-item">Inbox</a>
                                    <a href="email-read.html" class="dropdown-item">Read Email</a>
                                </div>
                            </div>

                            <a href="calendar.html" class="dropdown-item">Calendar</a>
                            <a href="apps-chat.html" class="dropdown-item">Chat</a>
                            <a href="apps-file-manager.html" class="dropdown-item">File Manager</a>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-invoice"
                                    role="button">
                                    Invoice <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-invoice">
                                   <a href="invoices.html" class="dropdown-item">Invoices</a>
                                   <a href="invoice-detail.html" class="dropdown-item">Invoice Detail</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-users"
                                    role="button">
                                    Users <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-users">
                                   <a href="users-list.html" class="dropdown-item">Users List</a>
                                  <a href="users-detail.html" class="dropdown-item">Users Detail</a>
                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                        >
                        <i class="uim uim-layer-group"></i> Components <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                    role="button">
                                    Forms <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="form-elements.html" class="dropdown-item">Basic Elements</a>
                                    <a href="form-validation.html" class="dropdown-item">Validation</a>
                                    <a href="form-plugins.html" class="dropdown-item">Plugins</a>
                                    <a href="form-editors.html" class="dropdown-item">Editors</a>
                                    <a href="form-uploads.html" class="dropdown-item">File Upload</a>
                                    <a href="form-wizard.html" class="dropdown-item">Wizard</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table"
                                    role="button">
                                    Tables <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="tables-bootstrap.html" class="dropdown-item">Bootstrap Tables</a>
                                    <a href="tables-datatable.html" class="dropdown-item">Data Tables</a>
                                    <a href="tables-editable.html" class="dropdown-item">Editable Table</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-charts"
                                    role="button">
                                    Charts <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-chart-1"
                                            role="button">
                                            Apexcharts Part 1 <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-chart-1">
                                            <a href="charts-line.html" class="dropdown-item">Line</a>
                                            <a href="charts-area.html" class="dropdown-item">Area</a>
                                            <a href="charts-column.html" class="dropdown-item">Column</a>
                                            <a href="charts-bar.html" class="dropdown-item">Bar</a>
                                            <a href="charts-mixed.html" class="dropdown-item">Mixed</a>
                                            <a href="charts-timeline.html" class="dropdown-item">Timeline</a>
                                            <a href="charts-candlestick.html" class="dropdown-item">Candlestick</a>
                                            <a href="charts-boxplot.html" class="dropdown-item">Boxplot</a>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-chart-2"
                                            role="button">
                                            Apexcharts Part 2 <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-chart-2">
                                            <a href="charts-bubble.html" class="dropdown-item">Bubble</a>
                                            <a href="charts-scatter.html" class="dropdown-item">Scatter</a>
                                            <a href="charts-heatmap.html" class="dropdown-item">Heatmap</a>
                                            <a href="charts-treemap.html" class="dropdown-item">Treemap</a>
                                            <a href="charts-pie.html" class="dropdown-item">Pie</a>
                                            <a href="charts-radialbar.html" class="dropdown-item">Radialbar</a>
                                            <a href="charts-radar.html" class="dropdown-item">Radar</a>
                                            <a href="charts-polararea.html" class="dropdown-item">Polararea</a>
                                        </div>
                                    </div>

                                   <a href="charts-echart.html" class="dropdown-item">E Charts</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-icons"
                                    role="button">
                                    Icons <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                    <a href="icons-remix.html" class="dropdown-item">Remix Icons</a>
                                    <a href="icons-materialdesign.html" class="dropdown-item">Material Design</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-map"
                                    role="button">
                                    Maps <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-map">
                                    <a href="maps-google.html" class="dropdown-item">Google Maps</a>
                                    <a href="maps-vector.html" class="dropdown-item">Vector Maps</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                        >
                        <i class="uim uim-box"></i> Extra Pages <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-more">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                    role="button">
                                    Authentication <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                    <a href="auth-login.html" class="dropdown-item">Login</a>
                                    <a href="auth-register.html" class="dropdown-item">Register</a>
                                    <a href="auth-recoverpw.html" class="dropdown-item">Recover Password</a>
                                    <a href="auth-lock-screen.html" class="dropdown-item">Lock Screen</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-extra-pages"
                                    role="button">
                                    Extra Pages <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-extra-pages">
                                    <a href="pages-starter.html" class="dropdown-item">Starter Page</a>
                                    <a href="pages-maintenance.html" class="dropdown-item">Maintenance</a>
                                    <a href="pages-comingsoon.html" class="dropdown-item">Coming Soon</a>
                                    <a href="pages-faqs.html" class="dropdown-item">FAQs</a>
                                    <a href="pages-profile.html" class="dropdown-item">Profile</a>
                                    <a href="pages-pricing.html" class="dropdown-item">Pricing</a>
                                    <a href="pages-404.html" class="dropdown-item">Error 404</a>
                                    <a href="pages-500.html" class="dropdown-item">Error 500</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button">
                            <i class="uim uim-window-grid"></i> <span>Layouts</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-layout-verti"
                                    role="button">
                                    <span key="t-vertical">Vertical</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-layout-verti">
                                    <a href="layouts-dark-sidebar.html" class="dropdown-item">Dark Sidebar</a>
                                    <a href="layouts-light-sidebar.html" class="dropdown-item">Light Sidebar</a>
                                    <a href="layouts-compact-sidebar.html" class="dropdown-item">Compact Sidebar</a>
                                    <a href="layouts-icon-sidebar.html" class="dropdown-item">Icon Sidebar</a>
                                    <a href="layouts-boxed.html" class="dropdown-item">Boxed Width</a>
                                    <a href="layouts-preloader.html" class="dropdown-item">Preloader</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-layout-hori"
                                    role="button">
                                    <span key="t-horizontal">Horizontal</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-layout-hori">
                                    <a href="layouts-horizontal.html" class="dropdown-item" >Horizontal</a>
                                    <a href="layouts-hori-topbar-dark.html" class="dropdown-item">Topbar Dark</a>
                                    <a href="layouts-hori-light-header.html" class="dropdown-item">Light Header</a>
                                    <a href="layouts-hori-boxed-width.html" class="dropdown-item">Boxed width</a>
                                    <a href="layouts-hori-preloader.html" class="dropdown-item">Preloader</a>
                                </div>
                            </div>
                        </div>
                    </li> --}}

                </ul>
            </div>
        </nav>
    </div>
</div>


