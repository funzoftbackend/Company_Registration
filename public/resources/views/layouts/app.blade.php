@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin dashboard</title>
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/public/favicon.ico') }}">
    <link rel="icon" href="{{ asset('/public/img/company_logo.png') }}" type="image/x-icon">

    <!-- Data table CSS -->
    <link href="{{ asset('/public/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Toast CSS -->
    <link href="{{ asset('/public/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}"
        rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('/public/dist/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Font Awesome CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
      @media (min-width:1000px) and (max-width:1200px) {
        .zmdi.zmdi-menu {
            margin-left: 9px !important;
        }
    }

      .zmdi.zmdi-menu {
        position: absolute;
        top: 40px !important;
        left: 60%;
        transform: translateX(-50%);
    }
        @media (min-width:1000px) and (max-width:1200px) {
            .pull-left1 {
                margin-left: 11% !important;
                margin-top: 13% !important;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .col-lg-3 {
                width: 21% !important;
            }

            .fixed-sidebar-left {
                width: 48px;
            }

            .navbar.navbar-inverse.navbar-fixed-top .top-nav-search .input-group .input-group-btn {
                left: 43% !important;
            }

            .right-nav-text {
                margin-left: 18px !important;
            }

            .zmdi.zmdi-menu {
                margin-top: 24px;
            }

            .page-wrapper {
                min-height: 1020px !important;
            }
        }

        .brand-img {
            top: -3px;
        }

        @media (min-width: 1000px) {
        ..wrapper.theme-5-active .navbar.navbar-inverse {
            background: #ed1c25 30% !important;
        }
    @media (max-width:450px){
        .zmdi.zmdi-menu {
            margin-top:-9px !important;
        }
        .slide-nav-toggle .fixed-sidebar-left .right-nav-text{
        padding-left: 11px;
        }
    }
        @media(min-width:1200px) {
            #toggle_nav_btn {
                margin-left: -2px !important;
            }

            .navbar.navbar-inverse.navbar-fixed-top .nav-header .logo-wrap .brand-img {
                margin-left: 0%;
                width: 30px !important;
                height: 30px !important;
                top: 12% !important;
            }

            .brand-img {
                top: -16px !important;
            }
        }
        .wrapper.theme-5-active .navbar.navbar-inverse {
            background: #ED1C25;
        }
        .right-img {
            width: 102px;
            height: 48px;
        }
        .navbar-heading h1{
            width: 1240px;
            height: 50px;
            padding: 7px 243px 43px 268px;
            gap: 10px;
            color: white !important;
            text-align: center;
            line-height: 49.8px;
            font-size: 41.15px;
            font-family: 'inter', sans-serif !important;
            font-weight: 500;
        }
        #country-select {
            width: 148px;
            height: 50px;
            top: 25px;
            left: 1242px;
            border-radius: 12px;
            border: 0.75px solid #000000;
            padding-left: 50px;
            background-size: 30px;
            background-position: 10px center;
            background-repeat: no-repeat;
        }
        /* Styling for the options */
        #country-select option {
            padding: 10px;
            font-size: 14px;
            background-color: #ffffff;
        }
    }
        .right-nav-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            line-height: 21px;
            letter-spacing: -1%;
            color: #1E4483;
        }

    </style>
</head>

<body>

    <!-- Preloader -->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!-- /Preloader -->
    <div class="wrapper  theme-5-active pimary-color-green">
        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left"
                    href="javascript:void(0);">
                    <img src="{{ asset('/public/img/new/toggle.png') }}" alt="Sidebar" style="width: 33px;
                    height: 33px;
                    margin-top: 15px;
                    margin-left: 8px;">
                </a>
            </div>
            <div class="navbar-heading"style="height: 50px; top: 25px; left: 405px;">
                <h1>
                    Welcome To Admin Dashboard
                </h1>
            </div>
            <div class="right_img">
                <img src="{{ asset('/public/img/new/country.png') }}" alt="Country" style="margin-right: -192px; margin-top: -108px;">
                <select id="country-select" name="country">
                    <option value="US" data-image="{{ asset('/public/img/flags/us.png') }}">United States</option>
                    <option value="UK" data-image="{{ asset('/public/img/flags/uk.png') }}">United Kingdom</option>
                    <!-- Add more options for other countries as needed -->
                </select>
            </div>
        </nav>

        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                <li>
                    <a href="{{ route('dashboard') }}" data-toggle="collapse" data-item="dashboard"
                        data-target="#dashboard_dr" onclick="setActive(this)">
                        <div class="pull-left pull-left1">
                            <img class="mr-20" src="{{ asset('/public/img/side_img/logo.png') }}" >
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" data-toggle="collapse" data-item="dashboard"
                        data-target="#dashboard_dr" onclick="setActive(this)">
                        <div class="pull-left pull-left1">
                            <img class ="mr-20" src = "{{ asset('/public/img/new/dashboard.png') }}"><span
                                class="right-nav-text">Dashboard</span>
                        </div>
                    </a>
                </li>
                @if ($user->user_role == 'superadmin')
                    <li>
                        <a href="{{ route('application.index') }}" data-toggle="collapse" data-target="#dashboard_dr"
                            data-item="applications" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/side_img/applications.png') }}"><span
                                    class="right-nav-text">Applications</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lead.index') }}" data-toggle="collapse" data-target="#dashboard_dr"
                            data-item="leads" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/side_img/leads.png') }}"><span
                                    class="right-nav-text">Leads</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="companies" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/side_img/companies.png') }}"><span
                                    class="right-nav-text">Companies</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="users" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/side_img/user.png') }}"><span
                                    class="right-nav-text">Users</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaction.index') }}" data-toggle="collapse"
                            data-target="#dropdown_dr_lv1" data-item="transactions" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/side_img/transection.png') }}"><span
                                    class="right-nav-text">Transactions</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('partner.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="partners" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/side_img/partner.png') }}"><span
                                    class="right-nav-text">Partners</span></div>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('application.index') }}" data-toggle="collapse"
                            data-target="#dashboard_dr" data-item="applications" onclick="setActive(this)">
                            <div class="pull-left pull-left1">
                                <img class ="mr-20"
                                    src = "{{ asset('/public/img/side_img/applications.png') }}"><span
                                    class="right-nav-text">Applications</span>
                            </div>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /Left Sidebar Menu -->

        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid pt-25">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , made with ❤️ by
                        <a href="https://funzoft.com" target="_blank" class="footer-link fw-medium">Funzoft Pvt.
                            Ltd</a>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->
    <!-- jQuery -->
    <script src="{{ asset('/public/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/public/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Data table JavaScript -->
    <script src="{{ asset('/public/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('/public/dist/js/jquery.slimscroll.js') }}"></script>
    <!-- Progressbar Animation JavaScript -->
    <script src="{{ asset('/public/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('/public/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('/public/dist/js/dropdown-bootstrap-extended.js') }}"></script>
    <!-- Sparkline JavaScript -->
    <script src="{{ asset('/public/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- Owl JavaScript -->
    <script src="{{ asset('/public/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <!-- Switchery JavaScript -->
    <script src="{{ asset('/public/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
    <!-- EChartJS JavaScript -->
    <script src="{{ asset('/public/vendors/bower_components/echarts/dist/echarts-en.min.js') }}"></script>
    <script src="{{ asset('/public/vendors/echarts-liquidfill.min.js') }}"></script>
    <!-- Init JavaScript -->
    <script src="{{ asset('/public/dist/js/init.js') }}"></script>
    <script src="{{ asset('/public/dist/js/dashboard-data.js') }}"></script>

    <script>
        document.getElementById('country-select').value = 'US'; // Set default value to United States
        // Function to set active class on the clicked item
        function setActive(element) {
            // Remove active class from all anchor tags
            const anchors = document.querySelectorAll('.nav.navbar-nav.side-nav.nicescroll-bar li a');

            if (anchors.length === 0) {
                // Add active class to the first li anchor tag
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:first-child a').classList.add('active');
            } else {
                // Remove active class from all li anchor tags
                anchors.forEach(a => {
                    a.classList.remove('active');
                });
            }

            // Add active class to the clicked anchor tag
            element.classList.add('active');

            // Store the active item's ID in local storage
            localStorage.setItem('activeItem', element.getAttribute('data-item'));
        }

        // Function to set active class on page load
        // Function to set active class on page load
        window.addEventListener('load', function() {
            const activeItemId = localStorage.getItem('activeItem');
            const anchors = document.querySelectorAll('.nav.navbar-nav.side-nav.nicescroll-bar li a');
            const isDashboardUrl = window.location.href.includes('dashboard');

            if (!activeItemId || anchors.length === 0) {
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:first-child a').classList.add(
                    'active');
                return;
            }

            anchors.forEach(a => {
                a.classList.remove('active');
            });

            if (isDashboardUrl) {
                const activeDashboardElement = document.querySelector(
                    '.nav.navbar-nav.side-nav.nicescroll-bar li a[data-item="dashboard"]');
                if (activeDashboardElement) {
                    activeDashboardElement.classList.add('active');
                    return;
                }
            }

            const activeElement = document.querySelector(
                `.nav.navbar-nav.side-nav.nicescroll-bar li a[data-item="${activeItemId}"]`);
            if (activeElement) {
                activeElement.classList.add('active');
            } else {
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:first-child a').classList.add(
                    'active');
            }
        });
    </script>

</body>

</html>
