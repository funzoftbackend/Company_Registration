<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login</title>
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/public/img/logo.png') }}">
    <link rel="icon" width="10px" height="10px" href="{{ asset('/public/img/logo.png') }}" type="image/x-icon">

    <!-- Data table CSS -->
    <link href="{{ asset('/public/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Toast CSS -->
    <link href="{{ asset('/public/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}"
        rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('/public/dist/css/style1.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/vendors/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <style>
        .small-image-4 {
            position: absolute !important;
            width: 344px !important;
            height: 140px !important;
            top: -750px !important;
            left: 1187px !important;
        }
        .small-image-1 {
          bottom: 464px !important;
          left: 1297px !important;
          width: 180px !important;
        }

        .col-sm-8 {
            margin-left: -82% !important;
        }

        .form-wrap {
            width: 436px;
        }

        .col-sm-4 {
            margin-left: 40%;
        }

        .custom-font {
            font-family: 'Manrope', sans-serif;
            font-weight: 200;
            font-size: 23px;
            line-height: 34.5px;
        }

        .btn.btn-success.btn-block {
            background: #176634 !important;
        }
        .btn-primary{
            background: #1E4483 !important;
        }
        .sp-logo-wrap .brand-text {
            vertical-align: middle;
        }

        .btn-signup:hover {
            background-color: #c82333;
            border-color: #bd2130;
            color: #fff;
        }

        .invalid-input {
            border-color: red !important;
        }

        .sp-header {
            /*width: 1440px;*/
            height: 60px;
            padding: 18px 338px;
            gap: 10px;
            background-color: #D6222B;
            display: flex;
            align-items: center;
        }

        .header-text {
            font-size: 16px;
            line-height: 30px;
            color: #FFFFFF;
            margin: 0 auto;
        }

        .business-house {
            font-family: 'Poppins', sans-serif;
            font-weight: 900;
            font-size: 20px;
            line-height: 30px;
            color: #1C1B1F;
            width: 172px;
            height: 30px;
        }

        .welcome-heading {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 40px;
            line-height: 60px;
            color: #000000;
            width: 208px;
            height: 60px;
        }

        .login-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            color: #202020;
            width: 143px;
            height: 24px;
            opacity: 0.75;
        }

        .signup-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            line-height: 35px;
            text-align: center;
            width: 425px;
            height: 21px;
        }

        .container {
            position: relative;
            width: 650px;
            /* Width of the background image */
            height: 450px;
            /* Height of the background image */
        }
        #checkbox_2{
            margin-left: 2px !important;
        }

        .background-image {
            margin-left: 769px;
            margin-top: -1122px;
            width: 669px;
            height: 470px;
        }
        .forgot-password-link {
            width: 117px;
            height: 21px;
            text-align: right;
        }

        .forgot-password-link a {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            line-height: 50px;
            color: #D6222B;
            margin-right: -80px;
        }
        .small-image {
            position: absolute;
        }
        .small-image-2 {
            bottom: 405px !important;
            right: -1113px !important;
            width: 211px  !important;
        }

        .small-image-3 {
            left: 440% !important;
            top: -439px !important;
            width: 77px !important;
        }
    </style>
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    <div class="wrapper pa-0">
        <header class="sp-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="text-center text-white mb-0 header-text">We Are Service Provider by the Ministry of Industry,
                            Commerce & Tourism (MOICT) of Bahrain</h3>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form ml-auto mr-auto no-float">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <div class="mb-30">
                                            <h2 class="text-start txt-dark mb-10 custom-font business-house">BUSINESS
                                                HOUSE</h2>
                                            <h1 class="text-start txt-dark mb-10 custom-font welcome-heading">Welcome!
                                            </h1>
                                            <h6 class="text-start nonecase-font txt-grey custom-font login-text">Login
                                                To Continue</h6>
                                        </div>
                                        @if (session('success'))
                                        <div class="alert alert-success" style="color: white;" role="alert">
                                            {{ session('message') }}
                                        </div>
                                        @endif
                                        @if (session('error'))
                                        <div class="alert alert-danger" style="color: white;" role="alert">
                                            {{ session('error') }}
                                        </div>
                                        @endif
                                        <div class="form-wrap">
                                            <form id="signupform" method="POST" action="{{ route('post_signup') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="name">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        required="" id="name"
                                                        placeholder="Enter Your Name">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="email">Email
                                                        address</label>
                                                    <input type="email" name="email" class="form-control"
                                                        required="" id="email"
                                                        placeholder="Enter Your Email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10"
                                                        for="mobile_no">Mobile No</label>
                                                    <div class="clearfix"></div>
                                                    <input type="text" name="mobile_no" class="form-control"
                                                        required="" id="mobile_no"
                                                        placeholder="Enter Your Mobile No">
                                                </div>

                                                <button type="submit" class="btn btn-block btn-primary">
                                                    <i class="mr-2"></i> Signup
                                                </button>
                                                <div class="form-group mb-0 text-center">
                                                    <p class="signup-text">
                                                        Already have an account? <a href="{{ route('login') }}"
                                                            class="text-danger">Login</a>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Row -->
        </div>
    </div>

    <!-- /Main Content -->
    <!-- Image container -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-1 position-relative">
                <img src="{{ asset('/public/img/small/no_1.png') }}" alt="1" class="small-image small-image-1">
                <img src="{{ asset('/public/img/small/no_2.png') }}" alt="2" class="small-image small-image-2">
                <img src="{{ asset('/public/img/small/no_3.png') }}" alt="3" class="small-image small-image-3">
                <img src="{{ asset('/public/img/small/no_4.png') }}" alt="small image 4" class="small-image small-image-4">
                <img src="{{ asset('/public/img/Group_4.png') }}" alt="background" class="background-image">
            </div>
        </div>
    </div>

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
        // Highlighting input fields on focus
        $(document).ready(function() {
            $('#email').focus(function() {
                $(this).addClass('invalid-input');
            });

            $('#email').blur(function() {
                $(this).removeClass('invalid-input');
            });

            $('#password').focus(function() {
                $(this).addClass('invalid-input');
            });

            $('#password').blur(function() {
                $(this).removeClass('invalid-input');
            });
        });
    </script>
</body>

</html>
