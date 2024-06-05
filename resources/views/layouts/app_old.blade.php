@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin Dashboard</title>
    <meta name="author" content="hencework" />
    <<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/public/img/logo.png') }}">
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
        body {
            color: #878787;
            font-family: "Roboto", sans-serif;
            font-size: 14px;
            font-style: normal;
            line-height: 1.5;
            background: #e8f1fe !important;
            overflow-x: hidden;
         }
        .navbar-heading h1 {
            color: white !important;
            text-align: center;
            font-size: 25.15px;
            font-family: 'Inter', sans-serif !important;
            font-weight: 500;
        }
        .lead-table .btn.btn-danger {
           margin-top:1%;
        }
        .mbb-2{
            margin-top: -5%;
        }
          .ml-2 {
            margin-left:2%;
        }
        .left-img {
            height: 38px !important;
            width: 38px !important;
        }

        .icon-container {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 36.67px !important;
            height: 36.67px !important;
            border: 3.12px solid white !important;
            border-radius: 20px !important;
            font-size: 11px !important;
            padding-bottom: 11px !important;
            padding-top: 13px !important;
            margin-bottom: 8px !important;
            margin-right: -19px !important;
        }

        .fa-sign-out {
            color: white;
        }
         @media(min-width:1200px){
              .pull-left1 {
            margin-bottom: -9% !important;
        }
        .application{
           margin-top: -2% !important;
        }
        .mr-18{
            margin-bottom: 14%;
            margin-left:-3% !important;
        }
         }
        @media (min-width: 1000px) and (max-width: 1200px) {
            .zmdi.zmdi-menu {
                margin-left: 9px !important;
            }

            .pull-left1 {
                margin-left: 11% !important;
                margin-top: 13% !important;
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
        @media (min-width:579px) and (max-width: 1024px) {
            .navbar.navbar-inverse.navbar-fixed-top .mobile-only-brand {
                background: none !important;
                position: relative;
                z-index: 2;
            }
            .left-img{
                margin-top: -28px !important;
            }
            .right-div{
                margin-left: 100px !important;
            }
        }

        /* Media Query for mobile screens below 578px */
        @media (max-width: 578px) {
            .application-div .img-responsive {
                margin-top: 40px;
                margin-left: 20px !important;
            }
            .font-13 {
                padding-top: 34px !important;
            }
            .pt-25 {
                height: 1397px !important;
            }
            .main-div{
                padding-left: 0px !important;
            }
            .navbar.navbar-inverse.navbar-fixed-top .mobile-only-brand {
                background: none !important;
            }
            #filter-dropdown {
                height: 36px !important;
                margin-bottom: 25px;
            }
            .fixed-sidebar-left .side-nav li {
                width: 225px !important;
                height: 42px !important;
            }
            .business-text{
                font-weight: bold;
                margin-left: 9px !important;
                margin-bottom: 45px !important;
                font-family: 'Poppins', sans-serif;
                font-size: 15px !important;
                color: #1E4483;
            }
            .mr-18 {
                Width: 38.15px;
                Height: 32.15px;
                margin-bottom: 45px;
            }
            .navbar-heading h1 {
                font-size: 23px;
                margin-left: 77px !important;
                line-height: 20px;
                margin-bottom: -10px !important;
            }

            .icon-container {
                margin-right: 8px !important;
            }

            .dataTables_filter {
                margin-left: 40%;
            }

            .right-nav-text {
                padding-left: 10px !important;
            }

            .right_div {
                margin-right: 2% !important;
                margin-left: 3% !important;
                margin-top: 3% !important;
            }

            .col-xs-6 img,
            .col-xs-6 h1 {
                max-width: 80%;
            }

            .pl-0 {
                padding-left: 10px !important;
            }

            .col-xs-6 {
                width: 44% !important;
            }

            .left-img {
                margin-top: -31px;
                margin-left: -208px;
            }
            .fixed-sidebar-left{
                position: fixed;
                top: 67px !important;
            }
        }
            .fa.fa-sign-out {
                position: absolute;
                top: 7px !important;
                right: 6px !important;
            }

            .page-wrapper {
                min-height:auto !important;
            }

            .main-div {
                /* height: 1480px !important; */
                background: white;
                padding-top: 25px !important;
                border-radius: 20px !important;
            }
            .fixed-sidebar-left{
                position: fixed;
                top: 73px !important;
            }

            .col-xs-12 {
                margin-top: 4% !important;
                margin-bottom: -2% !important;
            }
            @media (max-width: 1024px) {
            .navbar.navbar-inverse.navbar-fixed-top .mobile-only-brand {
                /* background: #f2f2f2; */
                position: absolute !important;
                z-index: 2;
            }
        }


        @media (min-width: 320px) and (max-width: 400px) {
            .left-img {
                margin-top: -33px !important;
                margin-left: -258px !important;
            }
        }


        @media (min-width: 1200px) {
            .application-div .img-responsive {
                margin-top: 37px;
                margin-left: 37px !important;
            }

            .font-13 {
                padding-top: 0px !important;
            }
            .navbar.navbar-inverse.navbar-fixed-top {
                min-height: 50px !important;
            }

            .left-img {
                margin-left: -25px !important;
                height: 34px !important;
                margin-top: -41px !important;
            }

            .right-nav-text {
                margin-left: 12px;
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



            .mobile-only-brand .pull-left {
                height: 10px !important;
                width: 10px !important;
            }
        }

        .wrapper.theme-5-active .navbar.navbar-inverse {
            background: #ED1C25;
        }

        .right_img {
            float: right;
            margin-right: 2%;
            margin-top: -13px;
        }

        .navbar-heading h1 {
            width: 100%;
            padding: 7px 0;
            gap: 10px;
        }

        .right-nav-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            line-height: 21px;
            letter-spacing: -1%;
            color: #1E4483;
            padding-right: 37px !important;
        }
        .right-nav-text1 {
            color:white !important;
            font-size: 14px !important;
        }
        .main-div {
            background: white !important;
            border: 1px solid #1C71FF;
            box-shadow: 0px 0px 20px 0px #1C71FF59;
            padding-top: 20px !important;
            border-radius: 20px !important;
            padding-left: 14px;
            padding-right:14px;
            padding-bottom:14px;
    }
        .pull-left.pull-left2,
        .pull-left {
            width: 200px;
            height: 46px;
            margin-left: 11px !important;
            margin-top: 17px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 5px !important;
        }

        .pull-left.pull-left3 {
            background-color: #1E4483;
        }
        .pull-left3 .sidebar_img path{
         fill:white !important;
        }
        .pull-left3 svg path{
         stroke:white !important;
        }
        .dropbtn {
            padding: 0px !important;
            border-radius: 12px !important;
            width: 148px;
            height: 50px;
            top: 25px;
            left: 1242px;
            border: 0.75px solid #000000;
        }

        .right-div {
            margin: 10px 0px 0px 0px !important;
        }

        .side-nav .nav>li>a {
            display: flex;
            align-items: center;
        }

        .side-nav .nav>li>a .pull-left {
            display: flex;
            align-items: center;
        }

        .side-nav .nav>li>a .pull-left img {
            margin-right: 10px;
        }

        .side-nav .nav>li>a .right-nav-text {
            flex: 1;
        }

        .preloader-it {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0;
            left: 0;
            background: white;
            z-index: 10000;
        }

        .icon-container i,
        .icon-container span.glyphicon {
            margin-right: 0px;
            font-size: 18px;
        }

        .mr-18 {
            Width: 38.15px;
            Height: 34.15px;
        }

        .angle-bracket {
            margin-left: auto !important;
            margin-right: 5px !important;
        }
        .lead-table .btn .btn-danger{
            margin-top: 1% !important;
        }
        .business-text{
            font-weight: bold;
            margin-left: 9px !important;
            margin-bottom: 18px;
            font-family: 'Poppins', sans-serif;
            font-size: 17px;
            color: #1E4483;
        }
        .btn-success{
           background: #1E4483 !important;
           border: solid 1px #1E4483 !important;
           border-radius: 8px !important;
        }
        .btn-primary{
           background: #1E4483 !important;
           border: solid 1px #1E4483 !important;
           border-radius: 8px !important;
           display: inline-block !important;
           width: 87px !important;
           padding-top: 7px !important;
           text-align: center !important;
           margin-left: 90%;
        }
        td .btn-primary{
            margin-left: -1px !important;
        }
        .btn-danger{
           border-radius: 8px !important;
           margin-top: -10px;
           display: inline-block !important;
        }
        .btn-info{
           background: #1E4483 !important;
           border: solid 1px #1E4483 !important;
           border-radius: 8px !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover, .dataTables_wrapper .dataTables_paginate .paginate_button:hover, .dataTables_wrapper .dataTables_paginate .paginate_button:active, .dataTables_wrapper .dataTables_paginate .paginate_button:focus {
            background: #1E4483 !important;
            border-color: #1E4483 !important;
            color: #fff !important;}

        .card-header{
            font-weight: bolder !important;
            font-size: 25px !important;
            margin-top: -20px !important;
            width: 80% !important;
        }
        .dataTables_wrapper .dataTables_filter {
            padding-right: 0px;
        }
        .dataTables_wrapper .dataTables_filter input, .dataTables_wrapper .dataTables_length select {
            height: 36px !important;
            border-radius: 10px !important;
            width: 185px !important;
            border: 1px solid black;

        }
        #filter-dropdown{
            height: 38px !important;
        }
    </style>
</head>

<body>

    <!-- Preloader -->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!-- /Preloader -->
    <div class="wrapper theme-5-active primary-color-green">
        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left"
                    href="javascript:void(0);">
                    <img class="left-img" src="{{ asset('/public/img/new/toggle.png') }}" alt="Sidebar">
                </a>
            </div>
            <div class="navbar-heading"
                style="height: 50px; display: flex; align-items: center; justify-content: center;">
                <h1>Welcome To Admin Dashboard</h1>
                <div class="right_div" style="margin-left: auto; margin-right: 20px;">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="icon-container">
                            <i class="fa fa-sign-out"></i>
                        </div>
                    </a>
                </div>
            </div>
        </nav>

        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
               <li>
                    <a href="{{ route('dashboard') }}" data-toggle="collapse" data-target="#dashboard_dr">
                        <div class="pull-left pull-left1">
                            <img class="mr-18" src="{{ asset('/public/img/side_img/logo_7.webp') }}">
                            <span class="business-text">BUSINESS HOUSE</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" data-toggle="collapse" data-item="dashboard"
                        data-target="#dashboard_dr" onclick="setActive(this)">
                        <div class="pull-left pull-left2">
                            <svg  class="sidebar_img1" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#1E4483" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.5 12.1121C6.5 10.8535 6.5 10.2242 6.78556 9.70251C7.07112 9.18082 7.59282 8.85703 8.63622 8.20947L9.73622 7.52678C10.8392 6.84226 11.3907 6.5 12 6.5C12.6093 6.5 13.1608 6.84226 14.2638 7.52678L15.3638 8.20947C16.4072 8.85703 16.9289 9.18082 17.2144 9.70251C17.5 10.2242 17.5 10.8535 17.5 12.1121V12.9488C17.5 15.0942 17.5 16.167 16.8556 16.8335C16.2113 17.5 15.1742 17.5 13.1 17.5H10.9C8.82582 17.5 7.78873 17.5 7.14436 16.8335C6.5 16.167 6.5 15.0942 6.5 12.9488V12.1121Z" stroke="#1E4483" stroke-width="1.43"/>
                                <path d="M13.6496 14.2002H10.3496" stroke="#1E4483" stroke-width="1.43" stroke-linecap="round"/>
                                </svg>
                                <span
                                class="right-nav-text text ">Dashboard</span>
                        </div>


                    </a>
                </li>
                @if ($user->user_role == 'Super Admin')
                    <li>
                        <a href="{{ route('application.index') }}" data-toggle="collapse" data-target="#dashboard_dr"
                            data-item="applications" onclick="setActive(this)">
                            <div class="pull-left application pull-left1">
                                <svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 22.75H9C3.57 22.75 1.25 20.43 1.25 15V9C1.25 3.57 3.57 1.25 9 1.25H15C20.43 1.25 22.75 3.57 22.75 9V15C22.75 20.43 20.43 22.75 15 22.75ZM9 2.75C4.39 2.75 2.75 4.39 2.75 9V15C2.75 19.61 4.39 21.25 9 21.25H15C19.61 21.25 21.25 19.61 21.25 15V9C21.25 4.39 19.61 2.75 15 2.75H9Z"
                                        fill="#1E4483" />
                                    <path
                                        d="M9.29701 14.9624C9.00407 14.9624 8.7666 14.7249 8.7666 14.432C8.7666 14.1391 9.00407 13.9016 9.29701 13.9016H14.7024C14.9953 13.9016 15.2328 14.1391 15.2328 14.432C15.2328 14.7249 14.9953 14.9624 14.7024 14.9624H9.29701Z"
                                        fill="#1E4483" stroke="#1E4483" stroke-width="0.25" />
                                    <path
                                        d="M9.29701 12.5303C9.00407 12.5303 8.7666 12.2928 8.7666 11.9999C8.7666 11.7069 9.00407 11.4695 9.29701 11.4695H14.7024C14.9953 11.4695 15.2328 11.7069 15.2328 11.9999C15.2328 12.2928 14.9953 12.5303 14.7024 12.5303H9.29701Z"
                                        fill="#1E4483" stroke="#1E4483" stroke-width="0.25" />
                                    <path
                                        d="M9.29701 10.0977C9.00407 10.0977 8.7666 9.86018 8.7666 9.56725C8.7666 9.27432 9.00407 9.03685 9.29701 9.03685H11.7294C12.0224 9.03685 12.2598 9.27432 12.2598 9.56725C12.2598 9.86018 12.0224 10.0977 11.7294 10.0977H9.29701Z"
                                        fill="#1E4483" stroke="#1E4483" stroke-width="0.25" />
                                    <mask id="path-5-outside-1_53_359" maskUnits="userSpaceOnUse" x="6" y="5.18896"
                                        width="12" height="13" fill="black">
                                        <rect fill="white" x="6" y="5.18896" width="12" height="13" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.51351 17.8106V17.7926H15.5766V17.8106H15.7838C16.4555 17.8106 17 17.2661 17 16.5944V9.56956C17 9.46205 16.9573 9.35891 16.8812 9.28291L13.9061 6.30772C13.83 6.23167 13.7269 6.18896 13.6194 6.18896H8.21622C7.54452 6.18896 7 6.73351 7 7.40518V16.5944C7 17.2661 7.54452 17.8106 8.21622 17.8106H8.51351ZM7.81081 7.40518V16.5944C7.81081 16.8183 7.99232 16.9998 8.21622 16.9998H15.7838C16.0077 16.9998 16.1892 16.8183 16.1892 16.5944V9.97497H14.4302C13.7585 9.97497 13.2139 9.43048 13.2139 8.75875V6.99978H8.21622C7.99232 6.99978 7.81081 7.18129 7.81081 7.40518ZM14.0248 8.75875C14.0248 8.98264 14.2063 9.16416 14.4302 9.16416H15.6158L14.0248 7.57307V8.75875Z" />
                                    </mask>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.51351 17.8106V17.7926H15.5766V17.8106H15.7838C16.4555 17.8106 17 17.2661 17 16.5944V9.56956C17 9.46205 16.9573 9.35891 16.8812 9.28291L13.9061 6.30772C13.83 6.23167 13.7269 6.18896 13.6194 6.18896H8.21622C7.54452 6.18896 7 6.73351 7 7.40518V16.5944C7 17.2661 7.54452 17.8106 8.21622 17.8106H8.51351ZM7.81081 7.40518V16.5944C7.81081 16.8183 7.99232 16.9998 8.21622 16.9998H15.7838C16.0077 16.9998 16.1892 16.8183 16.1892 16.5944V9.97497H14.4302C13.7585 9.97497 13.2139 9.43048 13.2139 8.75875V6.99978H8.21622C7.99232 6.99978 7.81081 7.18129 7.81081 7.40518ZM14.0248 8.75875C14.0248 8.98264 14.2063 9.16416 14.4302 9.16416H15.6158L14.0248 7.57307V8.75875Z"
                                        fill="#1E4483" />
                                    <path
                                        d="M8.51351 17.8106V18.0606H8.76351V17.8106H8.51351ZM8.51351 17.7926V17.5426H8.26351V17.7926H8.51351ZM15.5766 17.7926H15.8266V17.5426H15.5766V17.7926ZM15.5766 17.8106H15.3266V18.0606H15.5766V17.8106ZM16.8812 9.28291L16.7045 9.45969L16.7045 9.45975L16.8812 9.28291ZM13.9061 6.30772L14.0828 6.13095L14.0828 6.13095L13.9061 6.30772ZM16.1892 9.97497H16.4392V9.72497H16.1892V9.97497ZM13.2139 6.99978H13.4639V6.74978H13.2139V6.99978ZM15.6158 9.16416V9.41416H16.2194L15.7926 8.98738L15.6158 9.16416ZM14.0248 7.57307L14.2015 7.3963L13.7748 6.96952V7.57307H14.0248ZM8.76351 17.8106V17.7926H8.26351V17.8106H8.76351ZM8.51351 18.0426H15.5766V17.5426H8.51351V18.0426ZM15.3266 17.7926V17.8106H15.8266V17.7926H15.3266ZM15.5766 18.0606H15.7838V17.5606H15.5766V18.0606ZM15.7838 18.0606C16.5935 18.0606 17.25 17.4041 17.25 16.5944H16.75C16.75 17.128 16.3174 17.5606 15.7838 17.5606V18.0606ZM17.25 16.5944V9.56956H16.75V16.5944H17.25ZM17.25 9.56956C17.25 9.39577 17.181 9.229 17.058 9.10607L16.7045 9.45975C16.7336 9.48882 16.75 9.52832 16.75 9.56956H17.25ZM17.058 9.10614L14.0828 6.13095L13.7293 6.4845L16.7045 9.45969L17.058 9.10614ZM14.0828 6.13095C13.9599 6.008 13.7932 5.93896 13.6194 5.93896V6.43896C13.6606 6.43896 13.7001 6.45534 13.7293 6.4845L14.0828 6.13095ZM13.6194 5.93896H8.21622V6.43896H13.6194V5.93896ZM8.21622 5.93896C7.40644 5.93896 6.75 6.59544 6.75 7.40518H7.25C7.25 6.87157 7.68259 6.43896 8.21622 6.43896V5.93896ZM6.75 7.40518V16.5944H7.25V7.40518H6.75ZM6.75 16.5944C6.75 17.4041 7.40645 18.0606 8.21622 18.0606V17.5606C7.68259 17.5606 7.25 17.128 7.25 16.5944H6.75ZM8.21622 18.0606H8.51351V17.5606H8.21622V18.0606ZM8.06081 16.5944V7.40518H7.56081V16.5944H8.06081ZM8.21622 16.7498C8.13039 16.7498 8.06081 16.6802 8.06081 16.5944H7.56081C7.56081 16.9563 7.85425 17.2498 8.21622 17.2498V16.7498ZM15.7838 16.7498H8.21622V17.2498H15.7838V16.7498ZM15.9392 16.5944C15.9392 16.6802 15.8696 16.7498 15.7838 16.7498V17.2498C16.1457 17.2498 16.4392 16.9563 16.4392 16.5944H15.9392ZM15.9392 9.97497V16.5944H16.4392V9.97497H15.9392ZM14.4302 10.225H16.1892V9.72497H14.4302V10.225ZM12.9639 8.75875C12.9639 9.56856 13.6204 10.225 14.4302 10.225V9.72497C13.8966 9.72497 13.4639 9.2924 13.4639 8.75875H12.9639ZM12.9639 6.99978V8.75875H13.4639V6.99978H12.9639ZM8.21622 7.24978H13.2139V6.74978H8.21622V7.24978ZM8.06081 7.40518C8.06081 7.31936 8.13039 7.24978 8.21622 7.24978V6.74978C7.85425 6.74978 7.56081 7.04322 7.56081 7.40518H8.06081ZM14.4302 8.91416C14.3443 8.91416 14.2748 8.84457 14.2748 8.75875H13.7748C13.7748 9.12071 14.0682 9.41416 14.4302 9.41416V8.91416ZM15.6158 8.91416H14.4302V9.41416H15.6158V8.91416ZM13.848 7.74985L15.4391 9.34093L15.7926 8.98738L14.2015 7.3963L13.848 7.74985ZM14.2748 8.75875V7.57307H13.7748V8.75875H14.2748Z"
                                        fill="#1E4483" mask="url(#path-5-outside-1_53_359)" />
                                </svg> <span class="right-nav-text text">Applications</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lead.index') }}" data-toggle="collapse" data-target="#dashboard_dr"
                            data-item="leads" onclick="setActive(this)">
                            <div class="pull-left pull-left1">
                                <svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.75 22.5H8.75C3.32 22.5 1 20.18 1 14.75V8.75C1 3.32 3.32 1 8.75 1H14.75C20.18 1 22.5 3.32 22.5 8.75V14.75C22.5 20.18 20.18 22.5 14.75 22.5ZM8.75 2.5C4.14 2.5 2.5 4.14 2.5 8.75V14.75C2.5 19.36 4.14 21 8.75 21H14.75C19.36 21 21 19.36 21 14.75V8.75C21 4.14 19.36 2.5 14.75 2.5H8.75Z" fill="#1E4483"/>
                                    <path d="M11.7773 13.7031V12.2202" stroke="#1E4483" stroke-width="0.75" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.1421 14.5138L11.8467 13.792" stroke="#1E4483" stroke-width="0.75" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.4131 14.5138L11.7085 13.792" stroke="#1E4483" stroke-width="0.75" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.9909 5.5469L11.9909 5.5469C12.3492 5.61916 12.6626 5.81731 12.8717 6.10656L11.9909 5.5469ZM11.9909 5.5469C11.8944 5.52745 11.7961 5.51758 11.6984 5.51758M11.9909 5.5469L11.6984 5.51758M10.7808 10.5464H10.7297H10.6558H10.6047H9.99023H9.86523V10.4214V10.2429C9.86523 9.58097 10.3303 9.02174 11.0052 8.7798C10.738 8.59209 10.5495 8.30682 10.4848 7.98289C10.3215 7.89626 10.2117 7.72434 10.2117 7.53026C10.2117 7.37528 10.2815 7.23387 10.3935 7.13908C10.3393 6.94816 10.331 6.74837 10.3702 6.55366C10.4306 6.25447 10.601 5.98674 10.8485 5.79895L10.7808 10.5464ZM10.7808 10.5464H13.5086H13.6336V10.4214V10.2429C13.6336 9.57607 13.1617 9.0135 12.4787 8.77448C12.7425 8.58596 12.9289 8.30124 12.9927 7.98053C13.1536 7.89307 13.2619 7.72212 13.2619 7.53021C13.2619 7.378 13.195 7.23872 13.0859 7.14391C13.0892 7.13026 13.0922 7.1166 13.0949 7.10292C13.0949 7.10288 13.0949 7.10285 13.0949 7.10281L12.9724 7.07821M10.7808 10.5464L12.8718 6.10658L12.7705 6.17981C12.9636 6.44696 13.0353 6.76601 12.9724 7.07821M12.9724 7.07821C12.9646 7.11702 12.9545 7.15589 12.9422 7.19443L12.9724 7.07821ZM11.9951 6.65262L11.9951 6.65262C12.1801 6.67796 12.3568 6.73188 12.5089 6.79146C12.4969 6.67699 12.4536 6.56435 12.3798 6.46226L11.9951 6.65262ZM11.9951 6.65262C11.7623 6.62079 11.6616 6.60133 11.6148 6.58408C11.6121 6.5831 11.6099 6.58222 11.6081 6.58145C11.6073 6.57922 11.6063 6.57648 11.6052 6.57314L11.6051 6.57308L11.518 6.3208L11.462 6.15891L11.9951 6.65262ZM11.0669 7.28362V7.73274C11.0669 8.10301 11.3683 8.40448 11.7386 8.40448C12.1089 8.40448 12.4103 8.10302 12.4103 7.73274V7.4092L11.0669 7.28362ZM11.0669 7.28362C11.1452 7.21961 11.2212 7.15588 11.287 7.10005C11.3495 7.13645 11.4193 7.16182 11.4955 7.18174C11.6094 7.2115 11.7484 7.23161 11.9128 7.25409L11.0669 7.28362ZM11.6984 5.51758C11.3902 5.51758 11.0885 5.61685 10.8485 5.79894L11.6984 5.51758ZM11.317 6.268L11.1167 6.44522C11.1166 6.44526 11.1166 6.44529 11.1166 6.44532C11.1067 6.45402 11.0672 6.4887 11.0095 6.53857C11.0866 6.37072 11.2378 6.23649 11.4277 6.17006L11.317 6.268ZM11.2635 9.33325L11.6881 9.56917L11.7487 9.60284L11.8094 9.56924L12.2354 9.33327C12.5922 9.44629 12.8515 9.67306 12.9641 9.93925L10.7283 9.93897L10.6032 9.93896V9.93911L10.5348 9.93911C10.6474 9.67298 10.9067 9.44625 11.2635 9.33325Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    <path d="M8.13154 13.5431L8.13155 13.5431C8.34431 13.8374 8.4248 14.1917 8.35472 14.5394C8.35196 14.5531 8.34896 14.5668 8.3457 14.5804C8.4548 14.6752 8.52172 14.8145 8.52172 14.9667C8.52172 15.1586 8.41342 15.3296 8.25251 15.417C8.18868 15.7377 8.0023 16.0225 7.73844 16.211C8.42141 16.45 8.8934 17.0126 8.8934 17.6793V17.8579V17.9829H8.7684H6.04058H5.98947H5.91558H5.86447H5.25H5.125V17.8579V17.6793C5.125 17.0175 5.59009 16.4583 6.26494 16.2163C5.99777 16.0286 5.80929 15.7433 5.74458 15.4194C5.58126 15.3328 5.47141 15.1608 5.47141 14.9668C5.47141 14.8118 5.54128 14.6704 5.65323 14.5756C5.5991 14.3847 5.59076 14.1849 5.62999 13.9902L5.62999 13.9902C5.69032 13.691 5.86074 13.4233 6.10826 13.2355L8.13154 13.5431ZM8.13154 13.5431C7.92242 13.2538 7.60902 13.0557 7.25073 12.9835L8.13154 13.5431ZM7.13069 13.5785L7.13072 13.5785C7.34174 13.6211 7.52167 13.7356 7.63956 13.8988L7.63959 13.8988C7.71344 14.0009 7.75669 14.1135 7.76871 14.228C7.61658 14.1684 7.43985 14.1145 7.25486 14.0891L7.25484 14.0891C7.02208 14.0573 6.92132 14.0378 6.87455 14.0206C6.87187 14.0196 6.86965 14.0187 6.86782 14.018C6.86701 14.0157 6.86603 14.013 6.86487 14.0096C6.86487 14.0096 6.86487 14.0096 6.86487 14.0096L6.77773 13.7573L6.72181 13.5954C6.79593 13.5732 6.87536 13.5612 6.95816 13.5612C7.01534 13.5612 7.07345 13.567 7.13069 13.5785ZM6.37619 13.882C6.36101 13.8953 6.32264 13.929 6.2692 13.9751C6.34633 13.8073 6.49756 13.673 6.68749 13.6066L6.57676 13.7045L6.37629 13.8819C6.37626 13.8819 6.37623 13.8819 6.37619 13.882ZM7.17254 14.6906L7.17255 14.6906C7.34895 14.7147 7.52598 14.7795 7.67009 14.8457V15.1693C7.67009 15.5395 7.36865 15.841 6.9984 15.841C6.6281 15.841 6.32665 15.5395 6.32665 15.1693V14.7201C6.40494 14.6561 6.48098 14.5924 6.54679 14.5366C6.60921 14.573 6.67901 14.5983 6.75522 14.6182C6.86913 14.648 7.00816 14.6681 7.17254 14.6906ZM5.84972 17.3756L5.79456 17.3756C5.90712 17.1095 6.16652 16.8828 6.52324 16.7698L6.94788 17.0057L7.0085 17.0393L7.06915 17.0057L7.49516 16.7698C7.85194 16.8828 8.11133 17.1096 8.22385 17.3758L5.98803 17.3755L5.86302 17.3755V17.3756L5.84972 17.3756ZM7.25068 12.9834C7.15425 12.964 7.05585 12.9541 6.95815 12.9541C6.64997 12.9541 6.34823 13.0534 6.10827 13.2355L7.25068 12.9834Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    <path d="M15.522 17.9829H15.471H15.397H15.346H14.7314H14.6064V17.8579V17.6793C14.6064 17.0175 15.0715 16.4583 15.7464 16.2163C15.4793 16.0286 15.2908 15.7433 15.2261 15.4194C15.0627 15.3328 14.9529 15.1609 14.9529 14.9668C14.9529 14.8118 15.0228 14.6704 15.1347 14.5756C15.0806 14.3847 15.0722 14.1849 15.1115 13.9902C15.1718 13.691 15.3422 13.4233 15.5897 13.2355L15.522 17.9829ZM15.522 17.9829H18.2498H18.3748V17.8579V17.6793C18.3748 17.0126 17.9029 16.45 17.2199 16.211C17.4838 16.0225 17.6701 15.7377 17.734 15.417C17.8949 15.3296 18.0032 15.1586 18.0032 14.9667C18.0032 14.8145 17.9363 14.6752 17.8272 14.5804C17.8304 14.5668 17.8334 14.5531 17.8362 14.5394C17.8362 14.5394 17.8362 14.5393 17.8362 14.5393L17.7136 14.5147C17.7766 14.2025 17.7049 13.8835 17.5117 13.6163L15.522 17.9829ZM16.7322 12.9834C16.6357 12.964 16.5373 12.9541 16.4396 12.9541C16.1314 12.9541 15.8297 13.0534 15.5897 13.2355L16.7322 12.9834ZM17.613 13.5431C17.4039 13.2538 17.0905 13.0557 16.7322 12.9835L17.613 13.5431ZM16.6122 13.5785L16.6122 13.5785C16.8232 13.6211 17.0031 13.7356 17.121 13.8988L17.1211 13.8988C17.1949 14.0009 17.2382 14.1136 17.2502 14.228C17.0981 14.1684 16.9213 14.1145 16.7363 14.0891L16.7363 14.0891C16.5035 14.0573 16.4028 14.0378 16.356 14.0206C16.3534 14.0196 16.3512 14.0187 16.3493 14.018C16.3485 14.0157 16.3475 14.013 16.3464 14.0096L16.3464 14.0096L16.2592 13.7573L16.2033 13.5954C16.2774 13.5732 16.3568 13.5612 16.4396 13.5612C16.4968 13.5612 16.5549 13.567 16.6122 13.5785ZM16.0582 13.7045L15.8574 13.8822C15.8573 13.8822 15.8573 13.8823 15.8573 13.8823C15.8421 13.8956 15.8039 13.9292 15.7507 13.9751C15.8278 13.8072 15.979 13.673 16.169 13.6065L16.0582 13.7045ZM16.654 14.6906L16.654 14.6906C16.8304 14.7147 17.0074 14.7795 17.1516 14.8457V15.1693C17.1516 15.5395 16.8501 15.841 16.4799 15.841C16.1096 15.841 15.8081 15.5395 15.8081 15.1693L15.8081 14.7201C15.8865 14.656 15.9625 14.5923 16.0283 14.5366C16.0907 14.573 16.1605 14.5983 16.2367 14.6182C16.3506 14.648 16.4896 14.6681 16.654 14.6906ZM16.0047 16.7698L16.4293 17.0057L16.49 17.0393L16.5506 17.0057L16.9766 16.7698C17.3334 16.8828 17.5928 17.1096 17.7053 17.3758L15.4695 17.3755L15.3445 17.3755V17.3756L15.276 17.3756C15.3886 17.1095 15.648 16.8828 16.0047 16.7698Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    </svg>
                                    <span
                                    class="right-nav-text text">Leads</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" data-toggle="collapse"
                            data-target="#dropdown_dr_lv1" data-item="services" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.75 22.5H8.75C3.32 22.5 1 20.18 1 14.75V8.75C1 3.32 3.32 1 8.75 1H14.75C20.18 1 22.5 3.32 22.5 8.75V14.75C22.5 20.18 20.18 22.5 14.75 22.5ZM8.75 2.5C4.14 2.5 2.5 4.14 2.5 8.75V14.75C2.5 19.36 4.14 21 8.75 21H14.75C19.36 21 21 19.36 21 14.75V8.75C21 4.14 19.36 2.5 14.75 2.5H8.75Z" fill="#1E4483"/>
                                <path d="M15.8779 13.8571C15.9084 13.8575 15.9084 13.8575 15.9395 13.8579C16.232 13.8653 16.4744 13.9637 16.6904 14.1651C16.8959 14.385 17.0038 14.6476 16.9999 14.9471C16.9997 14.9673 16.9995 14.9875 16.9993 15.0083C16.9913 15.3014 16.8913 15.5512 16.681 15.7595C16.5525 15.8778 16.4123 15.9637 16.2606 16.0492C16.2351 16.0638 16.2097 16.0784 16.1835 16.0934C16.1297 16.1243 16.0759 16.155 16.022 16.1857C15.9161 16.246 15.8106 16.307 15.7051 16.3681C15.6256 16.414 15.5461 16.4599 15.4665 16.5057C15.3338 16.5822 15.201 16.6587 15.0683 16.7353C15.0158 16.7656 14.9632 16.7959 14.9106 16.8262C14.7886 16.8965 14.6667 16.967 14.5451 17.0381C14.5026 17.0629 14.4601 17.0877 14.4176 17.1125C14.3647 17.1434 14.3118 17.1743 14.2591 17.2054C13.8808 17.4254 13.5376 17.5609 13.0955 17.559C13.0665 17.5592 13.0375 17.5594 13.0077 17.5595C12.9129 17.56 12.8182 17.56 12.7235 17.56C12.6571 17.5603 12.5908 17.5606 12.5244 17.561C12.3328 17.562 12.1411 17.5624 11.9495 17.5628C11.7051 17.5634 11.4607 17.5642 11.2164 17.5655C11.1344 17.5659 11.0523 17.5662 10.9703 17.5662C10.879 17.5663 10.7877 17.5666 10.6963 17.567C10.6695 17.567 10.6426 17.5669 10.6149 17.5668C10.2362 17.5693 10.0358 17.7144 9.77708 17.9759C9.73129 18.0226 9.68566 18.0694 9.64007 18.1163C9.59393 18.1636 9.54772 18.2109 9.50137 18.258C9.47271 18.2871 9.44417 18.3164 9.41577 18.3458C9.30993 18.4536 9.23962 18.5072 9.08795 18.513C8.91095 18.5094 8.77953 18.4329 8.62787 18.348C8.59866 18.3322 8.56943 18.3165 8.54017 18.3008C8.45371 18.2541 8.36777 18.2066 8.28183 18.159C8.23752 18.1348 8.19319 18.1107 8.14882 18.0866C8.08605 18.0525 8.02332 18.0183 7.9607 17.9839C7.75389 17.8703 7.54534 17.76 7.3367 17.6499C7.07622 17.5122 6.81584 17.3744 6.5562 17.2352C6.5304 17.2215 6.50459 17.2077 6.47801 17.1935C6.07692 16.9779 6.07692 16.9779 6.01351 16.8419C5.98965 16.6908 5.98964 16.5728 6.07851 16.4447C6.14413 16.3605 6.2204 16.2864 6.29585 16.211C6.31435 16.1924 6.33285 16.1737 6.3519 16.1545C6.41295 16.093 6.47418 16.0316 6.53543 15.9703C6.57823 15.9274 6.62102 15.8844 6.6638 15.8415C6.75356 15.7514 6.84342 15.6615 6.93334 15.5716C7.04786 15.4571 7.16201 15.3423 7.27609 15.2273C7.36444 15.1384 7.45302 15.0498 7.54165 14.9612C7.58379 14.919 7.62585 14.8767 7.66783 14.8343C7.94993 14.5499 8.23278 14.2756 8.5989 14.101C8.61492 14.0932 8.63094 14.0854 8.64744 14.0773C8.9386 13.9398 9.23327 13.8873 9.55314 13.886C9.5938 13.8857 9.5938 13.8857 9.63529 13.8854C9.72482 13.8848 9.81435 13.8844 9.90389 13.884C9.93457 13.8839 9.96526 13.8837 9.99687 13.8836C10.126 13.8831 10.255 13.8826 10.3841 13.8824C10.5682 13.882 10.7522 13.8811 10.9363 13.8798C11.082 13.8787 11.2276 13.8783 11.3733 13.8782C11.4349 13.878 11.4965 13.8776 11.5581 13.877C12.0153 13.8729 12.343 13.895 12.6885 14.2219C12.8473 14.3902 12.9677 14.6246 12.968 14.858C12.9681 14.8794 12.9681 14.9007 12.9681 14.9227C12.968 14.9449 12.9679 14.967 12.9678 14.9898C12.9679 15.012 12.968 15.0342 12.9681 15.0571C12.9681 15.0891 12.9681 15.0891 12.968 15.1217C12.968 15.1412 12.968 15.1606 12.968 15.1806C12.9648 15.2322 12.9648 15.2322 12.9404 15.3053C13.1508 15.2378 13.3372 15.1431 13.5288 15.034C13.5582 15.0174 13.5876 15.0009 13.617 14.9843C13.8035 14.8793 13.9886 14.772 14.1726 14.6626C14.366 14.5478 14.5613 14.4362 14.7563 14.3242C14.8587 14.2653 14.9609 14.206 15.0629 14.1462C15.1079 14.12 15.153 14.0937 15.1981 14.0675C15.2182 14.0556 15.2383 14.0436 15.2591 14.0314C15.4627 13.9134 15.6415 13.8529 15.8779 13.8571ZM8.49725 15.0998C8.48193 15.1142 8.46662 15.1285 8.45084 15.1433C8.18447 15.3952 7.92749 15.657 7.66877 15.9167C7.59473 15.991 7.52061 16.0652 7.4465 16.1395C7.30211 16.2841 7.15779 16.4288 7.01352 16.5736C7.07578 16.6386 7.13588 16.6771 7.21579 16.7194C7.25565 16.7406 7.25565 16.7406 7.29631 16.7623C7.32553 16.7776 7.35474 16.793 7.38395 16.8084C7.41432 16.8245 7.44468 16.8406 7.47503 16.8568C7.55629 16.8999 7.63764 16.9429 7.71901 16.9859C7.8544 17.0574 7.98968 17.1292 8.12496 17.201C8.15834 17.2187 8.19172 17.2364 8.22511 17.2541C8.48154 17.3901 8.73648 17.5284 8.98915 17.6712C9.10189 17.578 9.20424 17.4804 9.30498 17.3744C9.58042 17.0867 9.88303 16.8474 10.2991 16.8325C10.3506 16.832 10.402 16.8319 10.4535 16.8321C10.4818 16.832 10.5101 16.8318 10.5393 16.8316C10.6322 16.8311 10.7252 16.8312 10.8182 16.8312C10.8832 16.8309 10.9483 16.8305 11.0133 16.8302C11.2017 16.8292 11.3902 16.8287 11.5786 16.8283C11.8181 16.8278 12.0577 16.8269 12.2972 16.8257C12.4087 16.8251 12.5201 16.825 12.6315 16.8249C12.6904 16.8247 12.7492 16.8244 12.8081 16.8241C12.8472 16.8242 12.8472 16.8242 12.8871 16.8243C13.1349 16.8227 13.3837 16.8079 13.605 16.6895C13.6207 16.6812 13.6363 16.673 13.6524 16.6645C13.7081 16.6348 13.7633 16.6043 13.8185 16.5736C13.8416 16.5609 13.8648 16.5481 13.8887 16.535C14.1555 16.3882 14.4204 16.2384 14.6823 16.0831C14.8363 15.9918 14.9912 15.9023 15.1462 15.8129C15.1728 15.7976 15.1995 15.7822 15.2269 15.7663C15.3545 15.6926 15.4823 15.6193 15.6107 15.547C15.6547 15.5222 15.6988 15.4973 15.7427 15.4723C15.7982 15.4409 15.8537 15.4097 15.9093 15.3788C15.9344 15.3645 15.9594 15.3503 15.9852 15.3356C16.0072 15.3233 16.0293 15.3109 16.0519 15.2982C16.1329 15.2413 16.1889 15.1743 16.2331 15.0858C16.2492 14.9599 16.2519 14.8516 16.1782 14.7443C16.1192 14.6685 16.0555 14.6303 15.9607 14.6124C15.7705 14.6045 15.646 14.6752 15.4862 14.7718C15.4597 14.7872 15.4332 14.8026 15.4059 14.8185C15.3507 14.8507 15.2957 14.8831 15.2408 14.9158C15.1649 14.9609 15.0887 15.0054 15.0124 15.0497C14.9161 15.1055 14.82 15.1616 14.7241 15.2179C14.4869 15.3568 14.2487 15.494 14.0103 15.6309C13.9483 15.6666 13.8866 15.7026 13.8248 15.7387C13.4837 15.937 13.1574 16.0692 12.76 16.0681C12.7235 16.0683 12.7235 16.0683 12.6862 16.0685C12.6064 16.0688 12.5267 16.0688 12.4469 16.0688C12.3912 16.0689 12.3354 16.069 12.2797 16.0691C12.1633 16.0693 12.0468 16.0693 11.9304 16.0691C11.7811 16.069 11.6319 16.0694 11.4827 16.07C11.3677 16.0703 11.2528 16.0703 11.1379 16.0703C11.0829 16.0703 11.0278 16.0704 10.9728 16.0707C10.896 16.071 10.8192 16.0708 10.7423 16.0705C10.7196 16.0707 10.6969 16.0709 10.6735 16.0711C10.5555 16.0701 10.4748 16.0658 10.3794 15.9883C10.3103 15.8989 10.2962 15.8319 10.2971 15.72C10.2969 15.6953 10.2967 15.6707 10.2965 15.6453C10.3078 15.5618 10.328 15.5182 10.3794 15.4517C10.4681 15.3882 10.5294 15.3693 10.6379 15.3687C10.6647 15.3684 10.6914 15.3681 10.719 15.3677C10.7621 15.3677 10.7621 15.3677 10.8061 15.3677C10.8358 15.3674 10.8655 15.3671 10.8962 15.3668C10.9912 15.3658 11.0862 15.3652 11.1812 15.3648C11.2761 15.3642 11.3709 15.3635 11.4658 15.3625C11.5248 15.3619 11.5838 15.3616 11.6428 15.3615C11.8933 15.3625 11.8933 15.3625 12.1066 15.2459C12.2026 15.1333 12.2196 15.0714 12.2164 14.9275C12.205 14.8372 12.1715 14.7868 12.1111 14.72C11.9711 14.6185 11.8416 14.6188 11.6733 14.6188C11.6512 14.6188 11.6291 14.6187 11.6064 14.6186C11.5333 14.6184 11.4603 14.6183 11.3872 14.6183C11.3362 14.6182 11.2852 14.6181 11.2343 14.618C11.1272 14.6179 11.0201 14.6179 10.913 14.6179C10.7766 14.6179 10.6402 14.6175 10.5038 14.6171C10.3984 14.6168 10.2929 14.6168 10.1875 14.6168C10.1372 14.6168 10.087 14.6167 10.0368 14.6165C9.44514 14.6145 8.94759 14.6768 8.49725 15.0998Z" fill="#1E4483"/>
                                <path d="M10.7962 6.00287C10.8131 6.0027 10.83 6.00254 10.8474 6.00236C10.9031 6.00192 10.9587 6.00201 11.0143 6.00215C11.0532 6.00204 11.092 6.00191 11.1309 6.00176C11.2122 6.00154 11.2936 6.0016 11.3749 6.00185C11.4789 6.00213 11.5829 6.00163 11.6869 6.00092C11.7671 6.00047 11.8473 6.00048 11.9276 6.00062C11.9659 6.00062 12.0042 6.00048 12.0426 6.00017C12.0963 5.99981 12.15 6.00007 12.2037 6.00049C12.2494 6.00049 12.2494 6.00049 12.2961 6.0005C12.418 6.01835 12.4958 6.07091 12.5701 6.16821C12.6299 6.30048 12.6259 6.43139 12.6235 6.57371C12.6971 6.60355 12.7631 6.62286 12.843 6.62249C12.8991 6.58558 12.9412 6.54255 12.9885 6.49491C13.0675 6.42618 13.1537 6.4028 13.2576 6.40297C13.3889 6.43129 13.463 6.47051 13.5594 6.56332C13.5716 6.57493 13.5838 6.58654 13.5964 6.59851C13.6383 6.63867 13.6797 6.67932 13.721 6.72005C13.7367 6.73535 13.7524 6.75066 13.7685 6.76643C13.8736 6.86898 13.9778 6.97232 14.0816 7.07613C14.1361 7.13058 14.1908 7.18482 14.2455 7.23906C14.2806 7.27403 14.3156 7.30901 14.3506 7.34401C14.3668 7.36002 14.383 7.37602 14.3996 7.39252C14.5239 7.51741 14.636 7.6307 14.6501 7.81571C14.6453 7.92323 14.616 8.02346 14.5354 8.09773C14.5217 8.10892 14.508 8.12011 14.4939 8.13165C14.4536 8.16417 14.4536 8.16417 14.4283 8.20787C14.4303 8.29382 14.4504 8.37037 14.4771 8.45177C14.5001 8.45064 14.523 8.44951 14.5467 8.44834C14.8258 8.44025 14.8258 8.44025 14.9085 8.49293C15.0491 8.63346 15.0653 8.77233 15.066 8.96548C15.0663 9.00847 15.0663 9.00847 15.0665 9.05233C15.0666 9.09829 15.0666 9.09829 15.0666 9.14519C15.0667 9.177 15.0668 9.20881 15.0668 9.24159C15.067 9.30879 15.067 9.37599 15.067 9.44319C15.067 9.52886 15.0673 9.61453 15.0678 9.70019C15.0681 9.78247 15.0681 9.86474 15.0681 9.94702C15.0683 9.97757 15.0685 10.0081 15.0687 10.0396C15.0677 10.4125 15.0677 10.4125 14.9543 10.5463C14.8423 10.6391 14.7879 10.6526 14.6433 10.65C14.6123 10.6495 14.5812 10.6491 14.5493 10.6486C14.5255 10.6481 14.5017 10.6475 14.4771 10.6469C14.4736 10.6645 14.4701 10.6821 14.4665 10.7003C14.4527 10.7689 14.4527 10.7689 14.434 10.8314C14.4219 10.8925 14.4219 10.8925 14.4616 10.9411C14.4851 10.9645 14.4851 10.9645 14.5091 10.9884C14.608 11.0943 14.6537 11.1641 14.6494 11.3116C14.6144 11.5388 14.3943 11.7126 14.2385 11.8677C14.2185 11.8877 14.1985 11.9077 14.1779 11.9284C14.136 11.9703 14.094 12.0123 14.0519 12.0541C13.9877 12.118 13.9238 12.1822 13.8599 12.2464C13.8189 12.2874 13.7779 12.3283 13.7369 12.3692C13.718 12.3883 13.699 12.4074 13.6794 12.427C13.4204 12.6839 13.4204 12.6839 13.2351 12.698C13.1251 12.693 13.0293 12.6605 12.9488 12.5841C12.9365 12.5707 12.9242 12.5572 12.9116 12.5433C12.8889 12.5211 12.8663 12.499 12.843 12.4762C12.7785 12.4741 12.7785 12.4741 12.721 12.5006C12.7024 12.5051 12.6838 12.5096 12.6646 12.5143C12.651 12.5178 12.6374 12.5214 12.6235 12.525C12.6245 12.5532 12.6255 12.5813 12.6265 12.6103C12.6257 12.7566 12.6117 12.8716 12.5152 12.9854C12.4064 13.0756 12.3527 13.0922 12.2124 13.093C12.1955 13.0932 12.1785 13.0934 12.1611 13.0935C12.1052 13.094 12.0493 13.0941 11.9934 13.0942C11.9545 13.0943 11.9156 13.0945 11.8766 13.0946C11.795 13.0949 11.7134 13.095 11.6318 13.095C11.5274 13.095 11.423 13.0957 11.3186 13.0965C11.2382 13.097 11.1577 13.0971 11.0773 13.0971C11.0389 13.0972 11.0004 13.0974 10.9619 13.0978C10.9079 13.0982 10.854 13.0981 10.8001 13.0978C10.7541 13.0979 10.7541 13.0979 10.7072 13.098C10.5855 13.0805 10.5086 13.0271 10.4316 12.9325C10.3959 12.8474 10.3968 12.78 10.3993 12.6881C10.4003 12.6422 10.4003 12.6422 10.4013 12.5954C10.4026 12.5605 10.4026 12.5605 10.4039 12.525C10.3863 12.5215 10.3687 12.5179 10.3506 12.5143C10.282 12.5006 10.282 12.5006 10.2191 12.4818C10.1585 12.4696 10.1585 12.4696 10.1131 12.5095C10.0911 12.533 10.0911 12.533 10.0686 12.557C9.9708 12.649 9.8815 12.6959 9.74538 12.6957C9.6159 12.6677 9.5427 12.6305 9.44857 12.5378C9.43152 12.5212 9.43152 12.5212 9.41412 12.5044C9.37696 12.4681 9.34026 12.4314 9.30359 12.3946C9.27771 12.369 9.25182 12.3434 9.22592 12.3179C9.17182 12.2643 9.11796 12.2104 9.06425 12.1565C8.9957 12.0876 8.92646 12.0195 8.857 11.9516C8.80336 11.899 8.75018 11.8459 8.69712 11.7927C8.67179 11.7674 8.6463 11.7423 8.62066 11.7173C8.48739 11.5872 8.37986 11.4775 8.35445 11.286C8.35587 11.172 8.38772 11.0796 8.46678 10.9969C8.48024 10.9845 8.4937 10.9721 8.50756 10.9594C8.54076 10.9255 8.54076 10.9255 8.57464 10.8908C8.57659 10.8274 8.57659 10.8274 8.55024 10.7689C8.5417 10.7283 8.53351 10.6877 8.52585 10.6469C8.5029 10.648 8.47995 10.6492 8.4563 10.6503C8.17717 10.6584 8.17717 10.6584 8.09445 10.6058C7.98313 10.4944 7.9557 10.4118 7.95502 10.2547C7.95485 10.2378 7.95468 10.2208 7.95451 10.2034C7.95407 10.1478 7.95416 10.0921 7.9543 10.0365C7.95419 9.99764 7.95406 9.95879 7.95391 9.91994C7.95369 9.83861 7.95375 9.75728 7.95399 9.67595C7.95427 9.57192 7.95378 9.46792 7.95307 9.36389C7.95262 9.28369 7.95263 9.20349 7.95277 9.12328C7.95277 9.08494 7.95262 9.0466 7.95232 9.00826C7.95196 8.95455 7.95222 8.90088 7.95264 8.84717C7.95264 8.81667 7.95264 8.78616 7.95265 8.75473C7.97044 8.63329 8.0239 8.55626 8.11836 8.4795C8.20343 8.44377 8.27081 8.44462 8.36274 8.4472C8.39333 8.44786 8.42393 8.44852 8.45545 8.4492C8.47868 8.45005 8.50192 8.4509 8.52585 8.45177C8.53114 8.42536 8.53114 8.42536 8.53652 8.39842C8.55024 8.32982 8.55024 8.32982 8.56901 8.26694C8.58126 8.2064 8.58126 8.2064 8.54138 8.16099C8.5257 8.14628 8.51001 8.13156 8.49384 8.1164C8.40179 8.01865 8.3549 7.92935 8.35512 7.79323C8.38318 7.66375 8.42038 7.59055 8.51304 7.49642C8.52407 7.48505 8.53511 7.47369 8.54648 7.46198C8.58274 7.42481 8.61943 7.38811 8.65619 7.35144C8.6818 7.32556 8.70739 7.29967 8.73297 7.27378C8.78657 7.21967 8.84039 7.16581 8.89438 7.1121C8.96321 7.04355 9.03129 6.97431 9.0992 6.90485C9.15185 6.85121 9.20494 6.79803 9.25816 6.74497C9.28344 6.71964 9.30857 6.69415 9.33353 6.66851C9.46365 6.53524 9.57329 6.42772 9.76485 6.4023C9.87881 6.40373 9.9712 6.43557 10.054 6.51464C10.0663 6.52809 10.0787 6.54155 10.0914 6.55541C10.1141 6.57755 10.1367 6.59968 10.16 6.62249C10.2234 6.62444 10.2234 6.62444 10.282 6.5981C10.3225 6.58955 10.3632 6.58137 10.4039 6.57371C10.4028 6.55075 10.4017 6.5278 10.4005 6.50415C10.3924 6.22502 10.3924 6.22502 10.4451 6.1423C10.5564 6.03098 10.6391 6.00355 10.7962 6.00287ZM11.16 6.74444C11.1359 6.84103 11.1117 6.93761 11.0869 7.03712C10.9994 7.16197 10.8848 7.19695 10.7454 7.24292C10.601 7.29255 10.465 7.34541 10.3292 7.41518C10.2124 7.47055 10.1276 7.48979 9.99938 7.47415C9.9405 7.45176 9.9405 7.45176 9.76977 7.32981C9.60879 7.49079 9.44781 7.65176 9.28196 7.81762C9.3222 7.87396 9.36245 7.9303 9.40391 7.98835C9.46186 8.16221 9.41419 8.2851 9.33836 8.4411C9.26116 8.6057 9.19676 8.7677 9.14295 8.94158C9.09941 9.03926 9.03695 9.11087 8.94049 9.1591C8.83183 9.17117 8.83183 9.17117 8.72098 9.18349C8.72098 9.42495 8.72098 9.66642 8.72098 9.9152C8.79342 9.92325 8.86586 9.9313 8.94049 9.93959C9.04731 9.97994 9.08638 10.0395 9.13333 10.1421C9.17461 10.2439 9.21284 10.3467 9.25038 10.4499C9.2876 10.5514 9.32902 10.6487 9.37647 10.746C9.42384 10.8481 9.44619 10.9231 9.4283 11.0372C9.38925 11.132 9.34406 11.1983 9.28196 11.2811C9.44294 11.442 9.60391 11.603 9.76977 11.7689C9.85428 11.7085 9.85428 11.7085 9.9405 11.6469C10.1144 11.589 10.2373 11.6366 10.3932 11.7125C10.5578 11.7897 10.7199 11.8541 10.8937 11.9079C10.9851 11.9486 11.0267 11.9804 11.0869 12.0616C11.111 12.1581 11.1351 12.2547 11.16 12.3542C11.3934 12.3542 11.6269 12.3542 11.8673 12.3542C11.8754 12.2738 11.8834 12.1933 11.8917 12.1103C11.9263 12.0167 11.9569 11.9933 12.0427 11.9411C12.1597 11.8876 12.2812 11.8444 12.402 11.8005C12.5036 11.7632 12.6008 11.7218 12.6981 11.6744C12.8002 11.627 12.8753 11.6046 12.9893 11.6225C13.0841 11.6616 13.1504 11.7068 13.2332 11.7689C13.3942 11.6079 13.5552 11.4469 13.721 11.2811C13.6808 11.2247 13.6405 11.1684 13.5991 11.1103C13.5411 10.9365 13.5888 10.8136 13.6646 10.6576C13.7418 10.493 13.8062 10.331 13.86 10.1571C13.9036 10.0594 13.966 9.98782 14.0625 9.93959C14.143 9.93154 14.2235 9.92349 14.3064 9.9152C14.3064 9.67373 14.3064 9.43227 14.3064 9.18349C14.2259 9.17544 14.1454 9.16739 14.0625 9.1591C13.9689 9.12449 13.9454 9.09395 13.8933 9.00818C13.8397 8.89114 13.7966 8.76968 13.7526 8.64879C13.7154 8.54725 13.674 8.45002 13.6265 8.35269C13.5791 8.25061 13.5568 8.17558 13.5747 8.06152C13.6137 7.96669 13.6589 7.90042 13.721 7.81762C13.4796 7.57615 13.4796 7.57615 13.2332 7.32981C13.1769 7.37005 13.1205 7.4103 13.0625 7.45176C12.8886 7.50971 12.7657 7.46204 12.6097 7.38621C12.4451 7.30901 12.2831 7.24461 12.1093 7.1908C12.0116 7.14726 11.94 7.0848 11.8917 6.98834C11.8837 6.90786 11.8756 6.82737 11.8673 6.74444C11.6339 6.74444 11.4005 6.74444 11.16 6.74444Z" fill="#1E4483"/>
                                <path d="M11.4933 7.9517C11.5315 7.95188 11.5315 7.95188 11.5704 7.95207C12.0179 7.96206 12.3546 8.14052 12.6717 8.4517C12.6873 8.4667 12.7029 8.4817 12.7189 8.49715C12.9868 8.77633 13.1009 9.16266 13.0985 9.54165C13.0984 9.56711 13.0983 9.59256 13.0981 9.61879C13.0881 10.0662 12.9097 10.4029 12.5985 10.72C12.5835 10.7356 12.5685 10.7512 12.5531 10.7673C12.2739 11.0351 11.8875 11.1493 11.5086 11.1468C11.4831 11.1467 11.4576 11.1466 11.4314 11.1465C10.984 11.1365 10.6473 10.958 10.3302 10.6468C10.3146 10.6318 10.299 10.6168 10.2829 10.6014C10.0151 10.3222 9.90095 9.93589 9.90336 9.5569C9.90348 9.53144 9.9036 9.50598 9.90373 9.47976C9.91372 9.0323 10.0922 8.6956 10.4034 8.37853C10.4184 8.36294 10.4334 8.34734 10.4488 8.33127C10.728 8.06345 11.1143 7.94929 11.4933 7.9517ZM10.8424 9.01268C10.6694 9.23795 10.6497 9.46953 10.6717 9.7444C10.6923 9.82738 10.7231 9.89221 10.7692 9.96391C10.7843 9.98891 10.7843 9.98891 10.7997 10.0144C10.9193 10.1931 11.0974 10.3241 11.3058 10.3785C11.5944 10.4045 11.8285 10.3801 12.0573 10.1895C12.2152 10.0394 12.3186 9.8738 12.3384 9.65331C12.3454 9.34642 12.2896 9.14653 12.0745 8.92008C11.8614 8.73344 11.6257 8.70318 11.3535 8.71584C11.1409 8.73437 10.9827 8.8602 10.8424 9.01268Z" fill="#1E4483"/>
                                </svg>
                                <span
                                    class="right-nav-text text">Services</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('countries.index') }}" data-toggle="collapse"
                            data-target="#dropdown_dr_lv1" data-item="countries" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.75 22.5H8.75C3.32 22.5 1 20.18 1 14.75V8.75C1 3.32 3.32 1 8.75 1H14.75C20.18 1 22.5 3.32 22.5 8.75V14.75C22.5 20.18 20.18 22.5 14.75 22.5ZM8.75 2.5C4.14 2.5 2.5 4.14 2.5 8.75V14.75C2.5 19.36 4.14 21 8.75 21H14.75C19.36 21 21 19.36 21 14.75V8.75C21 4.14 19.36 2.5 14.75 2.5H8.75Z" fill="#1E4483"/>
                                <path d="M8.01523 8.46211C7.91426 8.48574 7.97871 8.48145 7.89492 8.49219C7.53613 8.56953 7.80254 8.63828 8.01523 8.46211ZM14.3252 8.60605C14.351 8.58887 14.4412 8.50078 14.1598 8.41484C14.177 8.50293 14.1018 8.49434 14.1018 8.54375C14.3102 8.73281 14.3961 9.06152 14.6625 9.13027C14.7141 8.89395 14.4262 8.77793 14.3252 8.60605ZM7.82402 8.39336C7.85625 8.58457 8.0002 8.19141 8.00234 8.05176C7.94648 8.08398 7.89063 8.11621 7.83262 8.14199C7.96797 8.21074 7.8498 8.28379 7.70371 8.39336C7.40723 8.76289 7.98086 8.10547 7.82402 8.39336ZM11.5 6C8.46211 6 6 8.46211 6 11.5C6 14.5357 8.46211 17 11.5 17C14.5379 17 17 14.5357 17 11.5C17 8.46211 14.5379 6 11.5 6ZM11.6461 7.84336L11.6719 7.85195C11.5687 7.98516 12.209 8.37402 11.7492 8.40625C11.3195 8.52871 11.9297 8.29453 11.5967 8.33535C11.7729 8.09043 11.457 8.08613 11.6461 7.84336ZM9.03789 8.1957C8.8832 8.0668 8.39766 8.37188 8.56738 8.29883C8.98848 8.1334 8.59531 8.31602 8.69414 8.51367C8.60391 8.70059 8.66406 8.32891 8.44062 8.5502C8.27949 8.58672 7.88418 8.95195 7.93359 8.84023C7.9207 9.01426 7.46309 9.22051 7.40078 9.51055C7.25039 9.9123 7.36426 9.49551 7.33633 9.33867C7.12148 9.06582 6.73047 9.80059 6.84648 10.0906C7.04199 9.74687 7.02695 10.0541 6.88516 10.2066C7.0291 10.4709 6.7541 10.8146 7.02695 11.0102C7.14727 11.0381 7.38789 10.6063 7.28262 11.0553C7.35566 10.6664 7.48457 11.1477 7.69297 11.0402C7.70586 11.2443 7.83262 11.1498 7.86055 11.3969C8.20859 11.3711 8.52656 11.9598 8.11191 12.0715C8.17422 12.0543 8.29668 12.1639 8.43848 12.0801C8.6791 12.2713 9.31289 12.2949 9.33008 12.7676C8.89395 12.976 9.22266 13.5475 8.84453 13.7516C8.41055 13.6871 8.69629 14.2865 8.51367 14.2178C8.58672 14.6496 8.07539 14.1619 8.27305 14.4004C8.63613 14.6238 8.11406 14.5787 8.27734 14.742C8.09473 14.7033 8.39121 15.0814 8.44062 15.2211C8.70273 15.6465 8.21504 15.1266 8.07109 14.9848C7.93359 14.7098 7.60918 14.1834 7.51895 13.7516C7.46738 13.1242 6.98184 12.7031 6.87012 12.0908C6.7584 11.7492 7.17734 11.2014 6.95176 11.0102C6.75625 10.8576 6.83574 10.3355 6.71973 10.0605C7.00977 8.80371 7.93145 7.74453 9.03789 7.11719C8.92402 7.20098 9.68887 6.9002 9.60078 6.97324C9.57715 7.02695 10.0477 6.76914 10.3313 6.73047C10.3012 6.73477 9.59434 6.98828 9.78984 6.95391C9.48691 7.10215 9.75977 7.01836 9.91016 6.94316C9.60938 7.16445 9.37734 7.10215 9.03574 7.29766C8.69199 7.38789 8.76289 7.74453 8.51797 7.92285C8.66191 7.94863 9.02285 7.55117 9.2334 7.41152C9.7168 7.17734 8.98848 7.83691 9.44824 7.55332C9.29355 7.69727 9.32578 7.92715 9.23125 7.9916C9.18398 7.97871 9.41816 8.10332 9.03789 8.1957ZM9.78984 7.20742C9.74043 7.27402 9.67168 7.41797 9.63086 7.32988C9.575 7.35781 9.55352 7.47813 9.44824 7.38145C9.51055 7.33633 9.575 7.22891 9.45254 7.29551C9.5084 7.23535 10.0068 7.06562 9.97891 7.00117C10.067 6.94531 10.0584 6.91738 9.95742 6.95176C9.90586 6.93457 10.0799 6.78848 10.3119 6.76914C10.3441 6.76914 10.357 6.79062 10.299 6.78418C9.94883 6.8916 10.0992 6.86152 10.3355 6.78418C10.2453 6.83574 10.183 6.85078 10.168 6.87441C10.4043 6.78848 10.1551 6.93672 10.2088 6.92598C10.1422 6.96035 10.2195 6.97109 10.0906 7.02051C10.1143 7.00117 9.88008 7.16016 10.0197 7.11289C9.88438 7.2418 9.82422 7.24395 9.78984 7.20742ZM9.99609 7.51465C10.0004 7.3084 10.2969 7.17734 10.2604 7.1666C10.6256 6.99473 10.1336 7.17305 10.4215 7.01836C10.5289 7.00762 10.7566 6.66387 11.0725 6.64238C11.4205 6.53711 11.2594 6.64883 11.5172 6.55L11.4656 6.59297C11.4205 6.59941 11.4764 6.67891 11.3131 6.79922C11.2959 6.98613 11.0016 6.9002 11.1477 7.1C11.0531 6.96465 10.9113 7.0957 11.0896 7.10859C10.8984 7.25469 10.4537 7.28047 10.241 7.52324C10.1035 7.7209 9.97676 7.65859 9.99609 7.51465ZM11.5236 8.20215C11.3775 8.55449 11.2357 8.15059 11.4936 8.08613C11.558 8.12051 11.5838 8.13125 11.5236 8.20215ZM10.9736 7.49746C10.9307 7.33848 10.965 7.42227 11.2207 7.34707C11.3969 7.47383 11.0639 7.55762 10.9736 7.49746ZM14.974 13.8031C14.7721 13.4551 15.2189 13.1328 15.3693 12.8406C15.35 13.1822 15.307 13.5195 14.974 13.8031ZM15.7346 9.82637C15.5154 9.84355 15.3178 9.89512 15.1201 9.77051C14.6646 9.27207 15.2039 10.3334 15.3543 9.89941C15.8957 10.1057 15.3457 10.9951 15.0041 10.9027C14.8129 10.4902 14.5766 10.0369 14.1598 9.83496C14.4799 10.1895 14.6389 10.6256 14.9826 10.9457C15.0063 11.3926 15.4596 10.7824 15.4316 11.1283C15.4746 11.7234 14.7592 12.0801 14.8838 12.6773C15.1502 13.2209 14.3703 13.3197 14.4584 13.8074C14.1447 14.1576 13.8096 14.6303 13.2467 14.5551C13.2467 14.2586 13.0963 14.0072 13.0619 13.7021C12.7568 13.3154 13.3842 12.9008 12.9953 12.4969C12.5463 12.3959 13.0877 11.7771 12.6258 11.8352C12.3486 11.558 11.9426 11.8266 11.5451 11.8287C11.0467 11.876 10.5332 11.2164 10.7545 10.7502C10.5783 10.2646 11.3131 10.1229 11.3324 9.69531C11.6848 9.40098 12.1854 9.4375 12.6623 9.36875C12.6279 9.71035 12.9889 9.7125 13.2617 9.82637C13.4143 9.45684 13.8891 9.88652 14.2135 9.65234C14.3252 9.10664 13.8977 9.43535 13.6527 9.26133C13.3563 8.82734 14.2865 9.03789 14.1898 8.81016C13.8289 8.80801 14.033 8.36543 13.7773 8.6125C14.0072 8.65332 13.7365 8.83379 13.743 8.62754C13.3949 8.52656 13.7301 9.02285 13.5539 9.07012C13.2854 8.9584 13.4121 9.19688 13.44 9.2334C13.324 9.48477 13.1822 8.86387 12.8535 8.88105C12.527 8.58242 12.7246 9.01641 13.0082 9.0873C12.948 9.10449 13.0426 9.35156 12.9674 9.24629C12.7332 8.92402 12.2885 8.70918 12.0242 9.10449C11.9963 9.47402 11.2443 9.5793 11.3646 9.14746C11.1885 8.70059 11.9104 9.13457 11.8438 8.77793C11.3797 8.4707 11.9705 8.56953 12.1273 8.28164C12.484 8.29238 12.1424 7.98945 12.31 7.90137C12.2928 8.23008 12.5828 8.16777 12.8127 8.10547C12.7568 7.91641 12.9502 7.92285 12.832 7.76602C13.3648 7.55332 12.426 7.86484 12.615 7.39863C12.3852 7.23965 12.5184 7.74883 12.615 7.80254C12.6215 7.95938 12.4883 8.15273 12.3057 7.82402C12.0393 7.99805 12.0672 7.64785 12.05 7.68438C12.0199 7.54902 12.252 7.54258 12.2541 7.30625C12.2348 7.15586 12.2391 7.07637 12.3465 7.06777C12.3551 7.08926 12.7869 7.0957 12.9395 7.27402C12.5227 7.19023 12.8771 7.34277 13.0641 7.42871C12.8643 7.27188 13.1436 7.42871 12.9803 7.25039C13.0447 7.26328 12.802 7.00547 13.0512 7.23105C12.9158 7.06992 13.3154 7.11719 13.0791 6.99688C13.425 7.09355 13.2209 7.00547 13.0168 6.91738C12.4539 6.58223 14.0115 7.3707 13.3756 7.02051C13.7816 7.10859 12.5076 6.70684 13.0877 6.88301C12.8664 6.78633 13.0812 6.84004 13.2811 6.90234C12.9223 6.79062 12.3852 6.58223 12.4066 6.57363C12.5313 6.58223 12.6537 6.61016 12.7719 6.64453C13.1393 6.7541 12.6666 6.61875 12.7676 6.6209C14.0309 6.94531 15.1373 7.7918 15.8098 8.89824C15.9666 9.06367 16.3941 10.1572 16.1707 9.67168C16.2717 10.0584 16.2867 10.4752 16.3404 10.8705C16.2287 10.7459 16.1041 10.2861 15.9967 10.0305C15.9516 10.1293 15.9 9.89082 15.7346 9.82637Z" fill="#1E4483"/>
                                </svg>
                                <span
                                    class="right-nav-text text">Countries</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="companies" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.75 22.5H8.75C3.32 22.5 1 20.18 1 14.75V8.75C1 3.32 3.32 1 8.75 1H14.75C20.18 1 22.5 3.32 22.5 8.75V14.75C22.5 20.18 20.18 22.5 14.75 22.5ZM8.75 2.5C4.14 2.5 2.5 4.14 2.5 8.75V14.75C2.5 19.36 4.14 21 8.75 21H14.75C19.36 21 21 19.36 21 14.75V8.75C21 4.14 19.36 2.5 14.75 2.5H8.75Z" fill="#1E4483"/>
                                <path d="M8.99978 11.1389H7.22756C6.88531 11.1389 6.71418 11.1389 6.58346 11.2055C6.46847 11.2641 6.37498 11.3575 6.31639 11.4726C6.24978 11.6033 6.24978 11.7744 6.24978 12.1167V17.25M14.4998 11.1389H16.272C16.6143 11.1389 16.7854 11.1389 16.9161 11.2055C17.0311 11.2641 17.1246 11.3575 17.1832 11.4726C17.2498 11.6033 17.2498 11.7744 17.2498 12.1167V17.25M14.4998 17.25V8.20556C14.4998 7.52105 14.4998 7.17879 14.3666 6.91735C14.2494 6.68737 14.0624 6.50039 13.8324 6.38322C13.571 6.25 13.2287 6.25 12.5442 6.25H10.9553C10.2708 6.25 9.92857 6.25 9.66713 6.38322C9.43715 6.50039 9.25017 6.68737 9.133 6.91735C8.99978 7.17879 8.99978 7.52105 8.99978 8.20556V17.25M17.8609 17.25H5.63867M11.1387 8.69444H12.3609M11.1387 11.1389H12.3609M11.1387 13.5833H12.3609" stroke="#1E4483" stroke-width="1.22222" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg><span
                                    class="right-nav-text text">Companies</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="users" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.75 22.5H8.75C3.32 22.5 1 20.18 1 14.75V8.75C1 3.32 3.32 1 8.75 1H14.75C20.18 1 22.5 3.32 22.5 8.75V14.75C22.5 20.18 20.18 22.5 14.75 22.5ZM8.75 2.5C4.14 2.5 2.5 4.14 2.5 8.75V14.75C2.5 19.36 4.14 21 8.75 21H14.75C19.36 21 21 19.36 21 14.75V8.75C21 4.14 19.36 2.5 14.75 2.5H8.75Z" fill="#1E4483"/>
                                <path d="M14.1946 8.94444C14.1946 10.2945 13.1001 11.3889 11.7501 11.3889C10.4001 11.3889 9.30566 10.2945 9.30566 8.94444C9.30566 7.59441 10.4001 6.5 11.7501 6.5C13.1001 6.5 14.1946 7.59441 14.1946 8.94444Z" stroke="#1E4483" stroke-width="1.22222" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.7504 13.2222C9.38788 13.2222 7.47266 15.1374 7.47266 17.4999H16.0282C16.0282 15.1374 14.113 13.2222 11.7504 13.2222Z" stroke="#1E4483" stroke-width="1.22222" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span
                                    class="right-nav-text text">Users</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaction.index') }}" data-toggle="collapse"
                            data-target="#dropdown_dr_lv1" data-item="transactions" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.75 22.5H8.75C3.32 22.5 1 20.18 1 14.75V8.75C1 3.32 3.32 1 8.75 1H14.75C20.18 1 22.5 3.32 22.5 8.75V14.75C22.5 20.18 20.18 22.5 14.75 22.5ZM8.75 2.5C4.14 2.5 2.5 4.14 2.5 8.75V14.75C2.5 19.36 4.14 21 8.75 21H14.75C19.36 21 21 19.36 21 14.75V8.75C21 4.14 19.36 2.5 14.75 2.5H8.75Z" fill="#1E4483"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3965 7.39645C13.5917 7.20119 13.9083 7.20119 14.1035 7.39645L16.9328 10.2257C17.3108 10.6037 17.0431 11.25 16.5086 11.25H6.75C6.47386 11.25 6.25 11.0261 6.25 10.75C6.25 10.4739 6.47386 10.25 6.75 10.25H15.5429L13.3965 8.10355C13.2012 7.90829 13.2012 7.59171 13.3965 7.39645ZM7.9571 13.25H16.75C17.0261 13.25 17.25 13.0261 17.25 12.75C17.25 12.4739 17.0261 12.25 16.75 12.25H6.99142C6.45688 12.25 6.18918 12.8963 6.56716 13.2743L9.39645 16.1035C9.59171 16.2988 9.90829 16.2988 10.1036 16.1035C10.2988 15.9083 10.2988 15.5917 10.1036 15.3965L7.9571 13.25Z" fill="#1E4483"/>
                                </svg>
                                <span
                                    class="right-nav-text text">Transactions</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('partner.index') }}" data-toggle="collapse" data-target="#dropdown_dr_lv1"
                            data-item="partners" onclick="setActive(this)">
                            <div class="pull-left pull-left1"><svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.0006 22.7498H9.00063C7.68063 22.7498 6.58063 22.6198 5.65063 22.3398C5.31063 22.2398 5.09063 21.9098 5.11063 21.5598C5.36063 18.5698 8.39063 16.2197 12.0006 16.2197C15.6106 16.2197 18.6306 18.5598 18.8906 21.5598C18.9206 21.9198 18.7006 22.2398 18.3506 22.3398C17.4206 22.6198 16.3206 22.7498 15.0006 22.7498ZM6.72063 21.0598C7.38063 21.1898 8.13063 21.2498 9.00063 21.2498H15.0006C15.8706 21.2498 16.6206 21.1898 17.2806 21.0598C16.7506 19.1398 14.5606 17.7197 12.0006 17.7197C9.44063 17.7197 7.25063 19.1398 6.72063 21.0598Z" fill="#1E4483"/>
                                <path d="M15 2H9C4 2 2 4 2 9V15C2 18.78 3.14 20.85 5.86 21.62C6.08 19.02 8.75 16.97 12 16.97C15.25 16.97 17.92 19.02 18.14 21.62C20.86 20.85 22 18.78 22 15V9C22 4 20 2 15 2ZM12 14.17C10.02 14.17 8.42 12.56 8.42 10.58C8.42 8.60002 10.02 7 12 7C13.98 7 15.58 8.60002 15.58 10.58C15.58 12.56 13.98 14.17 12 14.17Z" stroke="#1E4483" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.9999 14.92C9.60992 14.92 7.66992 12.97 7.66992 10.58C7.66992 8.19002 9.60992 6.25 11.9999 6.25C14.3899 6.25 16.3299 8.19002 16.3299 10.58C16.3299 12.97 14.3899 14.92 11.9999 14.92ZM11.9999 7.75C10.4399 7.75 9.16992 9.02002 9.16992 10.58C9.16992 12.15 10.4399 13.42 11.9999 13.42C13.5599 13.42 14.8299 12.15 14.8299 10.58C14.8299 9.02002 13.5599 7.75 11.9999 7.75Z" fill="#1E4483"/>
                                </svg>
                                <span
                                    class="right-nav-text text">Partners</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                @elseif($user->user_role === 'Lead Generator' || $user->user_role === 'Lead Manager')
                 <li>
                        <a href="{{ route('lead.index') }}" data-toggle="collapse" data-target="#dashboard_dr"
                            data-item="leads" onclick="setActive(this)">
                            <div class="pull-left pull-left1">
                                <svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.75 22.5H8.75C3.32 22.5 1 20.18 1 14.75V8.75C1 3.32 3.32 1 8.75 1H14.75C20.18 1 22.5 3.32 22.5 8.75V14.75C22.5 20.18 20.18 22.5 14.75 22.5ZM8.75 2.5C4.14 2.5 2.5 4.14 2.5 8.75V14.75C2.5 19.36 4.14 21 8.75 21H14.75C19.36 21 21 19.36 21 14.75V8.75C21 4.14 19.36 2.5 14.75 2.5H8.75Z" fill="#1E4483"/>
                                    <path d="M11.7773 13.7031V12.2202" stroke="#1E4483" stroke-width="0.75" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.1421 14.5138L11.8467 13.792" stroke="#1E4483" stroke-width="0.75" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.4131 14.5138L11.7085 13.792" stroke="#1E4483" stroke-width="0.75" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.9909 5.5469L11.9909 5.5469C12.3492 5.61916 12.6626 5.81731 12.8717 6.10656L11.9909 5.5469ZM11.9909 5.5469C11.8944 5.52745 11.7961 5.51758 11.6984 5.51758M11.9909 5.5469L11.6984 5.51758M10.7808 10.5464H10.7297H10.6558H10.6047H9.99023H9.86523V10.4214V10.2429C9.86523 9.58097 10.3303 9.02174 11.0052 8.7798C10.738 8.59209 10.5495 8.30682 10.4848 7.98289C10.3215 7.89626 10.2117 7.72434 10.2117 7.53026C10.2117 7.37528 10.2815 7.23387 10.3935 7.13908C10.3393 6.94816 10.331 6.74837 10.3702 6.55366C10.4306 6.25447 10.601 5.98674 10.8485 5.79895L10.7808 10.5464ZM10.7808 10.5464H13.5086H13.6336V10.4214V10.2429C13.6336 9.57607 13.1617 9.0135 12.4787 8.77448C12.7425 8.58596 12.9289 8.30124 12.9927 7.98053C13.1536 7.89307 13.2619 7.72212 13.2619 7.53021C13.2619 7.378 13.195 7.23872 13.0859 7.14391C13.0892 7.13026 13.0922 7.1166 13.0949 7.10292C13.0949 7.10288 13.0949 7.10285 13.0949 7.10281L12.9724 7.07821M10.7808 10.5464L12.8718 6.10658L12.7705 6.17981C12.9636 6.44696 13.0353 6.76601 12.9724 7.07821M12.9724 7.07821C12.9646 7.11702 12.9545 7.15589 12.9422 7.19443L12.9724 7.07821ZM11.9951 6.65262L11.9951 6.65262C12.1801 6.67796 12.3568 6.73188 12.5089 6.79146C12.4969 6.67699 12.4536 6.56435 12.3798 6.46226L11.9951 6.65262ZM11.9951 6.65262C11.7623 6.62079 11.6616 6.60133 11.6148 6.58408C11.6121 6.5831 11.6099 6.58222 11.6081 6.58145C11.6073 6.57922 11.6063 6.57648 11.6052 6.57314L11.6051 6.57308L11.518 6.3208L11.462 6.15891L11.9951 6.65262ZM11.0669 7.28362V7.73274C11.0669 8.10301 11.3683 8.40448 11.7386 8.40448C12.1089 8.40448 12.4103 8.10302 12.4103 7.73274V7.4092L11.0669 7.28362ZM11.0669 7.28362C11.1452 7.21961 11.2212 7.15588 11.287 7.10005C11.3495 7.13645 11.4193 7.16182 11.4955 7.18174C11.6094 7.2115 11.7484 7.23161 11.9128 7.25409L11.0669 7.28362ZM11.6984 5.51758C11.3902 5.51758 11.0885 5.61685 10.8485 5.79894L11.6984 5.51758ZM11.317 6.268L11.1167 6.44522C11.1166 6.44526 11.1166 6.44529 11.1166 6.44532C11.1067 6.45402 11.0672 6.4887 11.0095 6.53857C11.0866 6.37072 11.2378 6.23649 11.4277 6.17006L11.317 6.268ZM11.2635 9.33325L11.6881 9.56917L11.7487 9.60284L11.8094 9.56924L12.2354 9.33327C12.5922 9.44629 12.8515 9.67306 12.9641 9.93925L10.7283 9.93897L10.6032 9.93896V9.93911L10.5348 9.93911C10.6474 9.67298 10.9067 9.44625 11.2635 9.33325Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    <path d="M8.13154 13.5431L8.13155 13.5431C8.34431 13.8374 8.4248 14.1917 8.35472 14.5394C8.35196 14.5531 8.34896 14.5668 8.3457 14.5804C8.4548 14.6752 8.52172 14.8145 8.52172 14.9667C8.52172 15.1586 8.41342 15.3296 8.25251 15.417C8.18868 15.7377 8.0023 16.0225 7.73844 16.211C8.42141 16.45 8.8934 17.0126 8.8934 17.6793V17.8579V17.9829H8.7684H6.04058H5.98947H5.91558H5.86447H5.25H5.125V17.8579V17.6793C5.125 17.0175 5.59009 16.4583 6.26494 16.2163C5.99777 16.0286 5.80929 15.7433 5.74458 15.4194C5.58126 15.3328 5.47141 15.1608 5.47141 14.9668C5.47141 14.8118 5.54128 14.6704 5.65323 14.5756C5.5991 14.3847 5.59076 14.1849 5.62999 13.9902L5.62999 13.9902C5.69032 13.691 5.86074 13.4233 6.10826 13.2355L8.13154 13.5431ZM8.13154 13.5431C7.92242 13.2538 7.60902 13.0557 7.25073 12.9835L8.13154 13.5431ZM7.13069 13.5785L7.13072 13.5785C7.34174 13.6211 7.52167 13.7356 7.63956 13.8988L7.63959 13.8988C7.71344 14.0009 7.75669 14.1135 7.76871 14.228C7.61658 14.1684 7.43985 14.1145 7.25486 14.0891L7.25484 14.0891C7.02208 14.0573 6.92132 14.0378 6.87455 14.0206C6.87187 14.0196 6.86965 14.0187 6.86782 14.018C6.86701 14.0157 6.86603 14.013 6.86487 14.0096C6.86487 14.0096 6.86487 14.0096 6.86487 14.0096L6.77773 13.7573L6.72181 13.5954C6.79593 13.5732 6.87536 13.5612 6.95816 13.5612C7.01534 13.5612 7.07345 13.567 7.13069 13.5785ZM6.37619 13.882C6.36101 13.8953 6.32264 13.929 6.2692 13.9751C6.34633 13.8073 6.49756 13.673 6.68749 13.6066L6.57676 13.7045L6.37629 13.8819C6.37626 13.8819 6.37623 13.8819 6.37619 13.882ZM7.17254 14.6906L7.17255 14.6906C7.34895 14.7147 7.52598 14.7795 7.67009 14.8457V15.1693C7.67009 15.5395 7.36865 15.841 6.9984 15.841C6.6281 15.841 6.32665 15.5395 6.32665 15.1693V14.7201C6.40494 14.6561 6.48098 14.5924 6.54679 14.5366C6.60921 14.573 6.67901 14.5983 6.75522 14.6182C6.86913 14.648 7.00816 14.6681 7.17254 14.6906ZM5.84972 17.3756L5.79456 17.3756C5.90712 17.1095 6.16652 16.8828 6.52324 16.7698L6.94788 17.0057L7.0085 17.0393L7.06915 17.0057L7.49516 16.7698C7.85194 16.8828 8.11133 17.1096 8.22385 17.3758L5.98803 17.3755L5.86302 17.3755V17.3756L5.84972 17.3756ZM7.25068 12.9834C7.15425 12.964 7.05585 12.9541 6.95815 12.9541C6.64997 12.9541 6.34823 13.0534 6.10827 13.2355L7.25068 12.9834Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    <path d="M15.522 17.9829H15.471H15.397H15.346H14.7314H14.6064V17.8579V17.6793C14.6064 17.0175 15.0715 16.4583 15.7464 16.2163C15.4793 16.0286 15.2908 15.7433 15.2261 15.4194C15.0627 15.3328 14.9529 15.1609 14.9529 14.9668C14.9529 14.8118 15.0228 14.6704 15.1347 14.5756C15.0806 14.3847 15.0722 14.1849 15.1115 13.9902C15.1718 13.691 15.3422 13.4233 15.5897 13.2355L15.522 17.9829ZM15.522 17.9829H18.2498H18.3748V17.8579V17.6793C18.3748 17.0126 17.9029 16.45 17.2199 16.211C17.4838 16.0225 17.6701 15.7377 17.734 15.417C17.8949 15.3296 18.0032 15.1586 18.0032 14.9667C18.0032 14.8145 17.9363 14.6752 17.8272 14.5804C17.8304 14.5668 17.8334 14.5531 17.8362 14.5394C17.8362 14.5394 17.8362 14.5393 17.8362 14.5393L17.7136 14.5147C17.7766 14.2025 17.7049 13.8835 17.5117 13.6163L15.522 17.9829ZM16.7322 12.9834C16.6357 12.964 16.5373 12.9541 16.4396 12.9541C16.1314 12.9541 15.8297 13.0534 15.5897 13.2355L16.7322 12.9834ZM17.613 13.5431C17.4039 13.2538 17.0905 13.0557 16.7322 12.9835L17.613 13.5431ZM16.6122 13.5785L16.6122 13.5785C16.8232 13.6211 17.0031 13.7356 17.121 13.8988L17.1211 13.8988C17.1949 14.0009 17.2382 14.1136 17.2502 14.228C17.0981 14.1684 16.9213 14.1145 16.7363 14.0891L16.7363 14.0891C16.5035 14.0573 16.4028 14.0378 16.356 14.0206C16.3534 14.0196 16.3512 14.0187 16.3493 14.018C16.3485 14.0157 16.3475 14.013 16.3464 14.0096L16.3464 14.0096L16.2592 13.7573L16.2033 13.5954C16.2774 13.5732 16.3568 13.5612 16.4396 13.5612C16.4968 13.5612 16.5549 13.567 16.6122 13.5785ZM16.0582 13.7045L15.8574 13.8822C15.8573 13.8822 15.8573 13.8823 15.8573 13.8823C15.8421 13.8956 15.8039 13.9292 15.7507 13.9751C15.8278 13.8072 15.979 13.673 16.169 13.6065L16.0582 13.7045ZM16.654 14.6906L16.654 14.6906C16.8304 14.7147 17.0074 14.7795 17.1516 14.8457V15.1693C17.1516 15.5395 16.8501 15.841 16.4799 15.841C16.1096 15.841 15.8081 15.5395 15.8081 15.1693L15.8081 14.7201C15.8865 14.656 15.9625 14.5923 16.0283 14.5366C16.0907 14.573 16.1605 14.5983 16.2367 14.6182C16.3506 14.648 16.4896 14.6681 16.654 14.6906ZM16.0047 16.7698L16.4293 17.0057L16.49 17.0393L16.5506 17.0057L16.9766 16.7698C17.3334 16.8828 17.5928 17.1096 17.7053 17.3758L15.4695 17.3755L15.3445 17.3755V17.3756L15.276 17.3756C15.3886 17.1095 15.648 16.8828 16.0047 16.7698Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    </svg>
                                    <span
                                    class="right-nav-text text">Leads</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('application.index') }}" data-toggle="collapse"
                            data-target="#dashboard_dr" data-item="applications" onclick="setActive(this)">
                            <div class="pull-left pull-left1">
                                <svg class="sidebar_img" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 22.75H9C3.57 22.75 1.25 20.43 1.25 15V9C1.25 3.57 3.57 1.25 9 1.25H15C20.43 1.25 22.75 3.57 22.75 9V15C22.75 20.43 20.43 22.75 15 22.75ZM9 2.75C4.39 2.75 2.75 4.39 2.75 9V15C2.75 19.61 4.39 21.25 9 21.25H15C19.61 21.25 21.25 19.61 21.25 15V9C21.25 4.39 19.61 2.75 15 2.75H9Z" fill="#1E4483"/>
                                    <path d="M9.29701 14.9624C9.00407 14.9624 8.7666 14.7249 8.7666 14.432C8.7666 14.1391 9.00407 13.9016 9.29701 13.9016H14.7024C14.9953 13.9016 15.2328 14.1391 15.2328 14.432C15.2328 14.7249 14.9953 14.9624 14.7024 14.9624H9.29701Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    <path d="M9.29701 12.5303C9.00407 12.5303 8.7666 12.2928 8.7666 11.9999C8.7666 11.7069 9.00407 11.4695 9.29701 11.4695H14.7024C14.9953 11.4695 15.2328 11.7069 15.2328 11.9999C15.2328 12.2928 14.9953 12.5303 14.7024 12.5303H9.29701Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    <path d="M9.29701 10.0977C9.00407 10.0977 8.7666 9.86018 8.7666 9.56725C8.7666 9.27432 9.00407 9.03685 9.29701 9.03685H11.7294C12.0224 9.03685 12.2598 9.27432 12.2598 9.56725C12.2598 9.86018 12.0224 10.0977 11.7294 10.0977H9.29701Z" fill="#1E4483" stroke="#1E4483" stroke-width="0.25"/>
                                    <mask id="path-5-outside-1_53_359" maskUnits="userSpaceOnUse" x="6" y="5.18896" width="12" height="13" fill="black">
                                    <rect fill="white" x="6" y="5.18896" width="12" height="13"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.51351 17.8106V17.7926H15.5766V17.8106H15.7838C16.4555 17.8106 17 17.2661 17 16.5944V9.56956C17 9.46205 16.9573 9.35891 16.8812 9.28291L13.9061 6.30772C13.83 6.23167 13.7269 6.18896 13.6194 6.18896H8.21622C7.54452 6.18896 7 6.73351 7 7.40518V16.5944C7 17.2661 7.54452 17.8106 8.21622 17.8106H8.51351ZM7.81081 7.40518V16.5944C7.81081 16.8183 7.99232 16.9998 8.21622 16.9998H15.7838C16.0077 16.9998 16.1892 16.8183 16.1892 16.5944V9.97497H14.4302C13.7585 9.97497 13.2139 9.43048 13.2139 8.75875V6.99978H8.21622C7.99232 6.99978 7.81081 7.18129 7.81081 7.40518ZM14.0248 8.75875C14.0248 8.98264 14.2063 9.16416 14.4302 9.16416H15.6158L14.0248 7.57307V8.75875Z"/>
                                    </mask>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.51351 17.8106V17.7926H15.5766V17.8106H15.7838C16.4555 17.8106 17 17.2661 17 16.5944V9.56956C17 9.46205 16.9573 9.35891 16.8812 9.28291L13.9061 6.30772C13.83 6.23167 13.7269 6.18896 13.6194 6.18896H8.21622C7.54452 6.18896 7 6.73351 7 7.40518V16.5944C7 17.2661 7.54452 17.8106 8.21622 17.8106H8.51351ZM7.81081 7.40518V16.5944C7.81081 16.8183 7.99232 16.9998 8.21622 16.9998H15.7838C16.0077 16.9998 16.1892 16.8183 16.1892 16.5944V9.97497H14.4302C13.7585 9.97497 13.2139 9.43048 13.2139 8.75875V6.99978H8.21622C7.99232 6.99978 7.81081 7.18129 7.81081 7.40518ZM14.0248 8.75875C14.0248 8.98264 14.2063 9.16416 14.4302 9.16416H15.6158L14.0248 7.57307V8.75875Z" fill="#1E4483"/>
                                    <path d="M8.51351 17.8106V18.0606H8.76351V17.8106H8.51351ZM8.51351 17.7926V17.5426H8.26351V17.7926H8.51351ZM15.5766 17.7926H15.8266V17.5426H15.5766V17.7926ZM15.5766 17.8106H15.3266V18.0606H15.5766V17.8106ZM16.8812 9.28291L16.7045 9.45969L16.7045 9.45975L16.8812 9.28291ZM13.9061 6.30772L14.0828 6.13095L14.0828 6.13095L13.9061 6.30772ZM16.1892 9.97497H16.4392V9.72497H16.1892V9.97497ZM13.2139 6.99978H13.4639V6.74978H13.2139V6.99978ZM15.6158 9.16416V9.41416H16.2194L15.7926 8.98738L15.6158 9.16416ZM14.0248 7.57307L14.2015 7.3963L13.7748 6.96952V7.57307H14.0248ZM8.76351 17.8106V17.7926H8.26351V17.8106H8.76351ZM8.51351 18.0426H15.5766V17.5426H8.51351V18.0426ZM15.3266 17.7926V17.8106H15.8266V17.7926H15.3266ZM15.5766 18.0606H15.7838V17.5606H15.5766V18.0606ZM15.7838 18.0606C16.5935 18.0606 17.25 17.4041 17.25 16.5944H16.75C16.75 17.128 16.3174 17.5606 15.7838 17.5606V18.0606ZM17.25 16.5944V9.56956H16.75V16.5944H17.25ZM17.25 9.56956C17.25 9.39577 17.181 9.229 17.058 9.10607L16.7045 9.45975C16.7336 9.48882 16.75 9.52832 16.75 9.56956H17.25ZM17.058 9.10614L14.0828 6.13095L13.7293 6.4845L16.7045 9.45969L17.058 9.10614ZM14.0828 6.13095C13.9599 6.008 13.7932 5.93896 13.6194 5.93896V6.43896C13.6606 6.43896 13.7001 6.45534 13.7293 6.4845L14.0828 6.13095ZM13.6194 5.93896H8.21622V6.43896H13.6194V5.93896ZM8.21622 5.93896C7.40644 5.93896 6.75 6.59544 6.75 7.40518H7.25C7.25 6.87157 7.68259 6.43896 8.21622 6.43896V5.93896ZM6.75 7.40518V16.5944H7.25V7.40518H6.75ZM6.75 16.5944C6.75 17.4041 7.40645 18.0606 8.21622 18.0606V17.5606C7.68259 17.5606 7.25 17.128 7.25 16.5944H6.75ZM8.21622 18.0606H8.51351V17.5606H8.21622V18.0606ZM8.06081 16.5944V7.40518H7.56081V16.5944H8.06081ZM8.21622 16.7498C8.13039 16.7498 8.06081 16.6802 8.06081 16.5944H7.56081C7.56081 16.9563 7.85425 17.2498 8.21622 17.2498V16.7498ZM15.7838 16.7498H8.21622V17.2498H15.7838V16.7498ZM15.9392 16.5944C15.9392 16.6802 15.8696 16.7498 15.7838 16.7498V17.2498C16.1457 17.2498 16.4392 16.9563 16.4392 16.5944H15.9392ZM15.9392 9.97497V16.5944H16.4392V9.97497H15.9392ZM14.4302 10.225H16.1892V9.72497H14.4302V10.225ZM12.9639 8.75875C12.9639 9.56856 13.6204 10.225 14.4302 10.225V9.72497C13.8966 9.72497 13.4639 9.2924 13.4639 8.75875H12.9639ZM12.9639 6.99978V8.75875H13.4639V6.99978H12.9639ZM8.21622 7.24978H13.2139V6.74978H8.21622V7.24978ZM8.06081 7.40518C8.06081 7.31936 8.13039 7.24978 8.21622 7.24978V6.74978C7.85425 6.74978 7.56081 7.04322 7.56081 7.40518H8.06081ZM14.4302 8.91416C14.3443 8.91416 14.2748 8.84457 14.2748 8.75875H13.7748C13.7748 9.12071 14.0682 9.41416 14.4302 9.41416V8.91416ZM15.6158 8.91416H14.4302V9.41416H15.6158V8.91416ZM13.848 7.74985L15.4391 9.34093L15.7926 8.98738L14.2015 7.3963L13.848 7.74985ZM14.2748 8.75875V7.57307H13.7748V8.75875H14.2748Z" fill="#1E4483" mask="url(#path-5-outside-1_53_359)"/>
                                    </svg>
                                    <span
                                    class="right-nav-text text">Applications</span>
                                <span class="angle-bracket">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L5 5L1 1" stroke="#1E4483" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
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
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a').classList.add('active');
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a .pull-left').classList
                    .add('pull-left3');
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a .right-nav-text')
                    .classList.add('right-nav-text1');
            } else {
                // Remove active class from all li anchor tags
                anchors.forEach(a => {
                    a.classList.remove('active');
                    a.querySelector('.pull-left').classList.remove('pull-left3');
                     const rightNavText = a.querySelector('.right-nav-text');
                    if (rightNavText) {
                        rightNavText.classList.remove('right-nav-text1');
                    }
                });
            }
            element.querySelector('.pull-left').classList.add('pull-left3');
            element.classList.add('active');
            element.querySelector('.right-nav-text').classList.add('right-nav-text1');
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
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a ').classList.add(
                    'active');
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a .pull-left')
                    .classList.add('pull-left3');
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a .right-nav-text')
                    .classList.add('right-nav-text1');
                return;
            }

            anchors.forEach(a => {
                a.classList.remove('active');
                a.querySelector('.pull-left').classList.remove('pull-left3');
                 const rightNavText = a.querySelector('.right-nav-text');
                if (rightNavText) {
                    rightNavText.classList.remove('right-nav-text1');
                }
            });

            if (isDashboardUrl) {
                const activeDashboardElement = document.querySelector(
                    '.nav.navbar-nav.side-nav.nicescroll-bar li a[data-item="dashboard"]');
                if (activeDashboardElement) {
                    activeDashboardElement.classList.add('active');
                    activeDashboardElement.querySelector('.pull-left').classList.add('pull-left3');
                    activeDashboardElement.querySelector('.right-nav-text').classList.add('right-nav-text1');
                    return;
                }
            }

            const activeElement = document.querySelector(
                `.nav.navbar-nav.side-nav.nicescroll-bar li a[data-item="${activeItemId}"]`);
            if (activeElement) {
                activeElement.classList.add('active');
                activeElement.querySelector('.pull-left').classList.add('pull-left3');
                activeElement.querySelector('.right-nav-text').classList.add('right-nav-text1');
            } else {
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a').classList.add(
                    'active');
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a .pull-left')
                    .classList.add(
                        'pull-left3');
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a .pull-left')
                    .classList.add(
                        'pull-left3');
                document.querySelector('.nav.navbar-nav.side-nav.nicescroll-bar li:second-child a .right-nav-text')
                    .classList.add(
                        'right-nav-text1');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
       var table1 = $('#user-table').DataTable();
        $('#user-filter-dropdown').change(function() {
            var filter = $(this).val();
            $.ajax({
                url: '{{ route('user.filter') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_role: filter
                },
                success: function(response) {
                    table1.clear().draw();
                    $.each(response.users, function(index, user) {
                        table1.row.add([
                            user.email,
                            user.user_role ? user.user_role.charAt(0).toUpperCase() + user.user_role.slice(1) : 'User Role Not Found',
                            user.mobile_no,
                            user.country ? user.country.name.charAt(0).toUpperCase() + user.country.name.slice(1) : 'Country Not Found',
                            user.package_name ? user.package_name.charAt(0).toUpperCase() + user.package_name.slice(1) : 'Package Name Not Found',
                            user.package_price,
                            user.passport_one_img,
                            user.passport_two_img,
                            user.amount,
                            user.amount_type,
                            '<a href="/user/' + user.id + '/edit" class="btn btn-primary">Edit</a>' +
                            '<form method="POST" action="/user/' + user.id + '" style="display:inline;">' +
                            '@csrf' +
                            '@method("DELETE")' +
                            '<button type="submit" class="btn btn-danger">Delete</button>' +
                            '</form>'
                        ]).draw();
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
            var table = $('#applications-table').DataTable();
              $('#filter-dropdown').change(function() {
                    var filter = $(this).val();
                    $.ajax({
                        url: '{{ route('applications.filter') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            filter: filter
                        },
                        success: function(response) {
                            table.clear().draw();

                            // Add new data to the DataTable
                            $.each(response, function(index, application) {
                                table.row.add([
                                    application.user ? application.user.name : 'User Not Found',
                                    application.type ? application.type.name : 'Type Not Found',
                                    application.payment_status,
                                    application.status ? application.status : 'Status Not Found',
                                    '<a href="/application/' + application.id + '" class="btn btn-info">View Detail</a>'
                                ]).draw();
                            });
                        }
                    });
                });
            $('.table').DataTable();
        });
    </script>

</body>

</html>