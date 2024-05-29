<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login</title>
    <meta name="author" content="hencework"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/public/favicon.ico') }}">
    <link rel="icon" width="10px" height="10px" href="{{asset('/public/img/logo.png') }}" type="image/x-icon">

    <!-- Data table CSS -->
    <link href="{{ asset('/public/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Toast CSS -->
    <link href="{{ asset('/public/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('/public/dist/css/style1.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/vendors/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .custom-font {
            font-family: 'Manrope', sans-serif;
            font-weight: 200;
            font-size: 23px;
            line-height: 34.5px;
        }
        .btn.btn-success.btn-block{
            background:#176634 !important;
        }
        .container-fluid {
            background: linear-gradient(180deg, #D2F0EA 0%, #FBFDFF 100%);
        }


        .btn-signup:hover {
            background-color: #c82333;
            border-color: #bd2130;
            color: #fff;
        }

        /* Style for invalid input */
        .invalid-input {
            border-color: red !important;
        }
    </style>
</head>
<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    <div class="wrapper  pa-0">
        <header class="sp-header">
            <div class="sp-logo-wrap pull-left">
                <a href="">
                    <img class="brand-img mr-10" width="79px" height="54px" src="{{asset('/public/img/logo.png') }}" alt="brand"/>
                    <span class="brand-text mt-5">Business House</span>
                </a>
            </div>
            <div class="form-group mb-0 pull-right">
                <span class="inline-block pr-10"><strong>New User?</strong></span>
                <a class="text-danger" href="{{route('signup')}}">Sign Up</a>
            </div>
            <div class="clearfix"></div>
        </header>

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
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="mb-30">
                                                <h1 class="text-start txt-dark mb-10 custom-font" style="font-weight: bold;">Welcome!</h1>
                                                <h6 class="text-start nonecase-font txt-grey custom-font">Login To Continue</h6>
                                            </div>
                                            @if (session('error'))
                                            <div class="alert alert-danger" style="color: white; role="alert">
                                                {{ session('error') }}
                                            </div>
                                            @endif
                                            <div class="form-wrap">
                                                <form id="loginForm" method="POST" action="{{ route('post_login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="email" class="control-label">Email address</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                            <input type="email" class="form-control" name="email" required id="email" placeholder="Enter Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password" class="control-label">Password</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                            <input type="password" class="form-control" required id="password" name="password" placeholder="Enter Password">
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-success btn-block">Login</button>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <a class="mt-5 capitalize-font txt-primary block font-15" href="forgot-password.html">Forgot password?</a>
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
        // Highlighting input fields on focus
        $(document).ready(function(){
            $('#email').focus(function(){
                $(this).addClass('invalid-input');
            });

            $('#email').blur(function(){
                $(this).removeClass('invalid-input');
            });

            $('#password').focus(function(){
                $(this).addClass('invalid-input');
            });

            $('#password').blur(function(){
                $(this).removeClass('invalid-input');
            });
        });
    </script>
</body>
</html>
