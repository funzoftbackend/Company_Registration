<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Reset Password</title>
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
            @media(min-width: 5450px){
                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2.col-xs-offset-1.position-relative{
                    margin-top: -830px !important;
                }
            }

            @media (min-width: 3001px) {
                body {
                    overflow:auto !important;
                }
                .container {
                    width: 100%;
                }
                .row {
                    margin-right: -15px;
                    margin-left: -15px;
                    margin-top: 4% !important;
                }

                .auth-form-wrap {
                    padding: 0px 383px !important;
                }
                .col-lg-8{
                    margin-left: -82% ;
                    margin-bottom: 300px !important; ;
                }

                .background-image {
                    margin-left: 832px;
                    margin-top: -1131px !important;
                    width: 534px;
                    height: 589px;
                }

                .small-image-2 {
                    position: absolute !important;
                    bottom: 423px !important;
                    right: -1041px !important;
                    width: 204px !important;
                }

                .small-image-3 {
                    position: absolute !important;
                    left: 1359px !important;
                    top: -456px !important;
                    width: 79px !important;
                }

                .small-image-5 {
                    position: absolute !important;
                    width: 310px !important;
                    height: 140px !important;
                    top: -744px !important;
                    left: 1148px !important;
                }

                .small-image-1 {
                    position: absolute !important;
                    bottom: 468px !important;
                    left: 1220px !important;
                    width: 217px !important;
                }

                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2.col-xs-offset-1.position-relative {
                    margin-top: -534px;
                    position: absolute !important;
                }
            }


/* Adjust other specific elements as needed */

            @media (min-width:1024px) and (max-width: 1440px) {
                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2.col-xs-offset-1.position-relative {
                    margin-top: 250px !important;
                }
                .background-image {
                    margin-left: 833px;
                    margin-top: -1295px !important;
                    width: 564px;
                    height: 566px;
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
                .small-image-5 {
                    position: absolute !important;
                    width: 344px !important;
                    height: 140px !important;
                    top: -841px !important;
                    left: 1170px !important;
                }
                .small-image-1 {
                    position: absolute !important;
                    bottom: 553px !important;
                    left: 1280px !important;
                    width: 204px !important;
                }
            }
            @media (min-width: 768px) and (max-width: 1023px) {

                .background-image {
                    margin-left: 833px;
                    margin-top: -1295px !important;
                    width: 564px;
                    height: 566px;
                }
                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2.col-xs-offset-1.position-relative{
                    margin-top: -264px;
                }
                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2 {
                    margin-top: 0% !important;
                    position: absolute !important;
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
                .small-image-5 {
                    position: absolute !important;
                    width: 344px !important;
                    height: 140px !important;
                    top: -841px !important;
                    left: 1170px !important;
                }
                .small-image-1 {
                    position: absolute !important;
                    bottom: 553px !important;
                    left: 1280px !important;
                    width: 204px !important;
                }

            }

            @media (min-width: 768px) and (max-width: 1440px) {
                body {
                    overflow:auto !important;
                }

            }
            @media (min-width: 1441px) and (max-width: 3000px) {

                body {
                    overflow: auto !important;
                }
                .col-lg-6.col-md-6.col-sm-8.col-xs-10.col-lg-offset-3.col-md-offset-3.col-sm-offset-2.col-xs-offset-1.position-relative {
                    margin-top: -20% !important;
                }
                .background-image {
                    margin-left: 847px;
                    margin-top: -1044px !important;
                    width: 550px;
                    height: 611px;
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
                .small-image-5 {
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
                margin-bottom: 122px ;
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
                height: 45px;
                padding: 18px 338px;
                gap: 10px;
                background-color: #D6222B;
                display: flex;
                align-items: center;
            }

            .header-text {
                font-size: 14px;
                line-height: 18px;
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
                height: 450px;
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
            @media (max-width:380px){
                .logo-img{
                margin-top: 77px !important;
                Width :141.95px;
                Height: 98.11px;
            }
                .position-relative{
                margin-top: 50% !important;
                }
            .col-md-6.col-md-offset-3 {
                width: 100% !important;
                margin-left: 0% !important;
                margin-right: auto !important;
            }
            .form-group {
                margin-bottom: 13px;
                width: 66%;
            }
            .forgot-password-link a {
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                font-size: 14px;
                line-height: 50px;
                color: #D6222B;
                margin-right: 55px;
            }

            .background-image {
                width: 305px !important;
                height: 446px !important;
                padding-bottom: 35px !important;
                margin-top: -346px !important;
                margin-left: 7px !important;
            }
            .small-image-3 {
                bottom: -110px !important;
                left: 112px !important;
                width: 69px !important;
            }
            .small-image {
                position: relative !important;
            }
            .small-image-2 {
                bottom: -111px !important;
                right: -123px !important;
                width: 162px !important;
                height: 46px !important;
            }
            .small-image-1 {
                bottom: -117px !important;
                left: 180px !important;
                width: 165px !important;
            }
            .small-image-5 {
                width: 167px !important;
                height: 128px !important;
                top: -172px !important;
                left: 181px !important;
            }
            .col-sm-8 {
                margin-left: -80% !important;
                margin-bottom: -19px !important;
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
                font-size: 13px !important;
                margin-top: 3px !important;
                margin-left: -361PX !important;
                line-height: 18px !important;
                height: 58px !important;
            }
            .sp-header {
                height: 70px;
                padding: 4px 359px;
            }
            .btn-primary{
                width: 65% !important;
            }
            .signup-text {
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                font-size: 14px;
                line-height: 35px;
                text-align: center;
                width: 288px;
                height: 21px;
            }

            .container {
                width: 100%;
            }
            .auth-form-wrap {
                padding: 0px 383px !important;
            }

        }
            @media (min-width: 380px) and (max-width: 767px) {
            .position-relative{
                margin-top: 50% !important;
                }
            .col-md-6.col-md-offset-3 {
                width: 100% !important;
                margin-left: 0% !important;
                margin-right: auto !important;
            }
            .form-group {
                margin-bottom: 13px;
                width: 66%;
            }
            .forgot-password-link a {
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                font-size: 14px;
                line-height: 50px;
                color: #D6222B;
                margin-right: 55px;
            }

            .background-image {
                width: 305px !important;
                height: 446px !important;
                padding-bottom: 35px !important;
                margin-top: -506px !important;
                margin-left: 7px !important;
            }
            .small-image-3 {
                bottom: 89px !important;
                left: 302px !important;
                width: 72px !important;
            }
            .small-image {
                position: relative !important;
            }
            .small-image-2 {
                bottom: 0px !important;
                right: 39px !important;
                width: 164px !important;
                height: 50px !important;
            }
            .small-image-1 {
                bottom: 44px !important;
                left: 194px !important;
                width: 179px !important;
            }
            .small-image-5 {
                width: 167px !important;
                height: 128px !important;
                top: -289px !important;
                left: 134px !important;
            }
            .col-sm-8 {
                margin-left: -80% !important;
                margin-bottom: -18px !important;
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
                font-size: 17px !important;
                margin-top: 3px !important;
                margin-left: -347PX !important;
                line-height: 18px !important;
                height: 58px !important;
            }
            .sp-header {
                height: 70px;
                padding: 4px 359px;
            }
            .btn-primary{
                width: 65% !important;
            }
            .signup-text {
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                font-size: 14px;
                line-height: 35px;
                text-align: center;
                width: 288px;
                height: 21px;
            }

            .container {
                width: 100%;
            }
            .auth-form-wrap {
                padding: 0px 383px !important;
            }
        }
        .logo-img{
            margin-top: -29px;
            Width :141.95px;
            Height: 98.11px;
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
                                            <img src="{{ asset('/public/img/logo_7.webp') }}" class="logo-img" alt="Logo image">
                                        </div>
                                        <div class="mb-30">
                                            <h2 class="text-start txt-dark mb-10 custom-font business-house">BUSINESS
                                                HOUSE</h2>
                                            <h1 class="text-start txt-dark mb-10 custom-font welcome-heading">Welcome!
                                            </h1>
                                            <h6 class="text-start nonecase-font txt-grey custom-font login-text">Reset Password
                                                </h6>
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
                                        <form method = "POST" action="{{ route('web.resend.code') }}">
                                            @csrf
                                        @if($_GET['email'])
                                                    <input type="hidden" name="email" class="form-control"
                                                            required="" id="email"
                                                            value = "{{ $_GET["email"] }}">
                                            @endif
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary mb-8">Resend Verification Code</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="form-wrap">
                                                <form id="resetForm" method="POST"
                                                    action="{{ route('web.reset.password') }}">
                                                    @csrf
                                                    @if ($_GET['email'])
                                                        <input type="hidden" name="email" class="form-control"
                                                            required="" id="email"
                                                            value = "{{ $_GET['email'] }}">
                                                    @endif
                                                    @if (session('code'))
                                                        <input type="hidden" name="code" class="form-control"
                                                            required="" id="code"
                                                            value = "{{ session('code') }}">
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="password" class="control-label">Password</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-lock"></i></span>
                                                            <input type="password" class="form-control" required
                                                                id="password" name="password"
                                                                placeholder="Enter Your Password">
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-block btn-primary">
                                                                <i class="mr-2"></i> Reset
                                                            </button>
                                                        </div>
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
                <img src="{{ asset('/public/img/small/no_1.webp') }}" alt=1" class="small-image small-image-1">
                <img src="{{ asset('/public/img/small/no_2.webp') }}" alt=2" class="small-image small-image-2">
                <img src="{{ asset('/public/img/small/no_3.webp') }}" alt=3" class="small-image small-image-3">
                <img src="{{ asset('/public/img/small/no_5.webp') }}" alt=small image 5" class="small-image small-image-5">
                <img src="{{ asset('/public/img/Group_6.webp') }}" alt="background" class="background-image">
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
