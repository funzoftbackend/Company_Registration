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
            @media (max-width: 1440px) {
                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2.col-xs-offset-1.position-relative {
                    margin-top: 200px !important;
                }
            }

            @media (min-width: 768px) and (max-width: 1440px) {
                .background-image {
                    margin-left: 770px;
                    margin-top: -1300px !important;
                    width: 640px !important;
                    height: 541px;
                }
                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2.col-xs-offset-1.position-relative {
                    margin-top: 100px !important;
                }

                .small-image-2 {
                    position: absolute !important;
                    bottom: 506px !important;
                    right: -1090px !important;
                    width: 214px !important;
                }

                .small-image-3 {
                    position: absolute !important;
                    left: 433% !important;
                    top: -541px !important;
                    width: 79px !important;
                }
                .small-image-4 {
                    position: absolute !important;
                    width: 344px !important;
                    height: 140px !important;
                    top: -841px !important;
                    left: 1170px !important;
                }
                .small-image-1 {
                    position: absolute !important;
                    bottom: 558px !important;
                    left: 1280px !important;
                    width: 204px !important;
                }
            }
            @media (min-width : 1600px) and (max-width : 3000px) {
                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2.col-xs-offset-1.position-relative {
                    margin-top: 7px !important;
                }
            }

            @media (min-width: 1441px) and (max-width: 3000px) {
                .background-image {
                    margin-left: 770px;
                    margin-top: -1112px !important;
                    width: 669px;
                    height: 533px;
                }
                .small-image-2 {
                    position: absolute !important;
                    bottom: 409px;
                    right: -1113px !important;
                    width: 211px !important;
                }

                .small-image-3 {
                    position: absolute !important;
                    left: 1430px !important;
                    top: -444px !important;
                    width: 79px !important;
                }
                .small-image-4 {
                    position: absolute !important;
                    width: 344px !important;
                    height: 140px !important;
                    top: -731px !important;
                    left: 1199px !important;
                }
                .small-image-1 {
                    position: absolute !important;
                    bottom: 458px !important;
                    left: 1291px !important;
                    width: 217px !important;
                }
            }


            .col-sm-8 {
                margin-left: -82% !important;
                margin-bottom: 201px !important;
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

            .btn-primary {
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


            #checkbox_2 {
                margin-left: 2px !important;
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
            @media (min-width: 300px) and (max-width: 767px) {
            .col-md-6.col-md-offset-3 {
                width: 100% !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .background-image {
                width: 454px !important;
                height: 474px !important;
                padding-bottom: 36px !important;
                margin-top: -66% !important;
                margin-left: 20px !important;
            }
            .small-image-3 {
                bottom: -24px !important;
                left: 35px !important;
                width: 83px !important;
            }
            .small-image {
                position: relative;
            }
            .small-image-2 {
                bottom: -24px !important;
                right: -47px !important;
                width: 200px !important;
                height: 56px !important;
            }
            .small-image-1 {
                bottom: 21px !important;
                left: 324px !important;
                width: 179px !important;
            }
            .small-image-4 {
                position: absolute !important;
                width: 237px !important;
                height: 140px !important;
                top: -211px !important;
                left: 288px !important;
            }
            .forgot-password-link {
                width: 343px !important;
                height: 21px !important;
                position: relative !important;
                text-align: right !important;
                margin-bottom: 20px !important;
                top: -53px !important;
            }
            .header-text {
                font-size: 18px !important;
                margin-top: 3px !important;
                margin-left: -220PX !important;
                line-height: 15px !important;
                height: 61px !important;
            }
            .sp-header {
                height: 70px;
                padding: 4px 359px;
            }

            .container {
                width: 100%;
            }
            .auth-form-wrap {
                padding: 0px 383px !important;
            }
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
                                            <form id="loginForm" method="POST" action="{{ route('post_login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="email">Email
                                                        address</label>
                                                    <input type="email" name="email" class="form-control"
                                                        required="" id="exampleInputEmail_2"
                                                        placeholder="Enter Your Email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10"
                                                        for="password">Password</label>
                                                    <div class="clearfix"></div>
                                                    <input type="password" name="password" class="form-control"
                                                        required="" id="exampleInputpwd_2"
                                                        placeholder="Enter Your Password">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="checkbox checkbox-primary">
                                                                <input id="checkbox_2" type="checkbox">
                                                                <label for="checkbox_2">Remember me</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group text-right">
                                                            <p class=" forgot-password-link">
                                                                <a href="{{route('showforgotpassword')}}">Forgot Password</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-block btn-primary">
                                                    <i class="mr-2"></i> Login
                                                </button>
                                                <div class="form-group mb-0 text-center">
                                                    <p class="signup-text">
                                                        Don't have an account? <a href="{{ route('signup') }}"
                                                            class="text-danger">Sign up</a>
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
