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
            .fa.fa-sign-out {
                width: 60px;
                height: 60px;
                font-size: 20px;
                border-width: 4px;
                margin-bottom: 20px;
                margin-right: 10px;
            }
        }

        .fa.fa-sign-out {
            width: 47px;
            height: 47px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            border: 3px solid #DFDFDF;
            margin-bottom: 19px;
            margin-right: 5px;
            background-color: #FFFFFF;
            /* Add background color */
        }

        @media(min-width:1200px) {
            #toggle_nav_btn {
                margin-left: 20px !important;
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
                <div class="nav-header pull-left">
                    <div class="logo-wrap">
                        <a href="{{ route('dashboard') }}">
                            <img class="brand-img" src="{{ asset('/public/img/logo_transparent.png') }}"
                                alt="brand" />
                            <span class="brand-text mt-5">Business House</span>
                        </a>
                    </div>
                </div>
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left"
                    href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view"
                    href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i
                        class="zmdi zmdi-more"></i></a>
                <form id="search_form" role="search" class="top-nav-search collapse pull-left">
                    <div class="input-group">
                        <input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="button" class="btn  btn-default" data-target="#search_form"
                                data-toggle="collapse" aria-label="Close" aria-expanded="true"><i
                                    class="zmdi zmdi-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class = "right_div">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i><span></span>
                </a>

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
                            <img class ="mr-20" src = "{{ asset('/public/img/icon.png') }}"><span
                                class="right-nav-text">Dashboard</span>
                        </div>
                    </a>
                </li>

                @if ($user->user_role == 'superadmin')
                    <li>
                        <a href="{{ route('application.index') }}" data-toggle="collapse" data-target="#dashboard_dr"
                            data-item="applications" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/form_svgrepo.com_black.png') }}"><span
                                    class="right-nav-text">Applications</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lead.index') }}" data-toggle="collapse" data-target="#dashboard_dr"
                            data-item="leads" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/connection-pattern-1105_svgrepo.com_black.png') }}"><span
                                    class="right-nav-text">Leads</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="companies" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/community-fill.png') }}"><span
                                    class="right-nav-text">Companies</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="users" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/shield-user-fill-black.png') }}"><span
                                    class="right-nav-text">Users</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaction.index') }}" data-toggle="collapse"
                            data-target="#dropdown_dr_lv1" data-item="transactions" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/arrow-left-right-line_black.png') }}"><span
                                    class="right-nav-text">Transactions</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('partner.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="partners" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><img class ="mr-20"
                                    src = "{{ asset('/public/img/user-2-fill_black.png') }}"><span
                                    class="right-nav-text">Partners</span></div>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('application.index') }}" data-toggle="collapse"
                            data-target="#dashboard_dr" data-item="applications" onclick="setActive(this)">
                            <div class="pull-left pull-left1">
                                <img class ="mr-20"
                                    src = "{{ asset('/public/img/form_svgrepo.com_black.png') }}"><span
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
