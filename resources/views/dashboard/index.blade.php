@extends('layouts.app')
<style>
    @media (min-width: 1000px) and (max-width: 1200px) {
        .zmdi.zmdi-menu {
            margin-left: 9px !important;
        }
    }
    @media (min-width: 320px) and (max-width: 400px) {
        .left-img {
            margin-top: 8px !important;
            margin-left: -250px !important;
        }
    }
    @media (min-width: 768px) {
        .col-xs-6.text-center.pl-0.pr-0.data-wrap-right img {
            margin-left: 70px !important;
        }

        .row {
            padding-left: 8%;
        }
    }

    @media (min-width: 1200px) {
        .col-xs-6.text-center.pl-0.pr-0.data-wrap-left {
            padding-top: 54px;
        }

        .page-wrapper {
            min-height: 690px !important;
        }

        .nav.navbar-nav.side-nav.nicescroll-bar {
            margin-left: -6px !important;
        }

        .zmdi.zmdi-menu {
            padding-left: calc((100% - 24px) / 2) !important;
        }
    }

    @media (max-width: 450px) {
        .zmdi.zmdi-menu {
            top: 50px !important;
        }
    }


    @media (max-width: 768px) {
        .col-xs-6.text-center.pl-0.pr-0.data-wrap-right img {
            margin-left: 20px !important;
        }
        .row {
            padding-left: 5%;
        }

        .zmdi.zmdi-menu {
            left: 50%;
            transform: translateX(-50%);
        }

        .zmdi-menu:before {
            padding-bottom: -10px !important;
        }

        .col-xs-6.text-center.pl-0.pr-0.data-wrap-right img {
            margin-left: 45px !important;
        }

        .zmdi.zmdi-menu {
            position: absolute;
            top: 32px;
            left: 50%;
            transform: translateX(-50%);
        }
    }

    .bg {
        width: 318px;
        height: 151px;
        background-color: #E8F1FE;
        box-shadow: 0 0 5.8px 0 #1C71FF;
    }

    .ml-3 {
        padding-top: 40px !important;
        margin-left: 2% !important;
        margin-bottom: 35px !important;
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        font-size: 24px;
        line-height: 36px;
        color: #212121;
    }

    .brand-img {
        width: 78.5px !important;
        height: 53.5px !important;
    }

    .col-lg-3 {
        border: none !important;
        border-radius: 8px;
        margin-left: 2% !important;
        margin-bottom: 2% !important;
    }

    .txt-dark1 {
        color: white !important;
        font-weight: 700;
    }

    .weight-500.uppercase-font.block.font-13,
    .txt-dark1 {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 600 !important;
        font-size: 14px !important;
        line-height: 21px !important;
        letter-spacing: -1% !important;
        color: #1E4483 !important;
    }

    .col-xs-6.text-center.pl-0.pr-0.data-wrap-right img {
        margin-left: 155px;
    }

    .main-div {
        height: 100% !important;
        background: white !important;
        border: 1px solid #1C71FF;
        box-shadow: 0px 0px 20px 0px #1C71FF59;
        padding-top: 60px !important;
        border-radius: 20px !important;
    }

    .pt-25 {
        margin-top: -60px !important;
    }

    .img-responsive {
        width: 65px;
        height: 65px;
        margin-left: 60px !important;
        margin-top: 25px ;
    }

    .application-div .img-responsive {
        margin-top: 42px;
        margin-left: 66px !important;
    }

    .page-wrapper {
        background: #e8f1fe !important;
    }
</style>


@section('content')
    <!-- Row -->
    <div class="main-div">
        <div class="row">
            @if ($user->user_role === 'superadmin')
                <a href="{{ route('application.index') }}">
                    <div class="col-lg-3 application-div bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0">
                                                    <img src="{{ asset('/public/img/new/application.png') }}" class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Applications</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totalapplications }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('lead.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-right">
                                                    <img src="{{ asset('/public/img/new/leads.png') }}" class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Leads</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totalleads }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('services.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-right">
                                                    <img src="{{ asset('/public/img/new/services.png') }}" class="img-responsive" alt="Service Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Services</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totalservices }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('countries.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-right">
                                                    <img src="{{ asset('/public/img/new/countries.png') }}" class="img-responsive" alt="Country Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Countries</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totalcountries }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('company.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-right">
                                                    <img src="{{ asset('/public/img/new/companies.png') }}" class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Companies</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totalcompanies }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('user.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-right">
                                                    <img src="{{ asset('/public/img/new/users.png') }}" class="img-responsive" alt="User Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Users</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totalusers }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('transaction.index') }}">
                    <div class="col-lg-3 col-md-6 bg col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-right">
                                                    <img src="{{ asset('/public/img/new/transections.png') }}" class="img-responsive" alt="Transaction Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Transactions</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totaltransactions }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('partner.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-right">
                                                    <img src="{{ asset('/public/img/new/partners.png') }}" class="img-responsive" alt="Partner Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Partners</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totalpartners }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @else
                <a href="{{ route('application.index') }}">
                    <div class="col-lg-3 application-div bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0">
                                                    <img src="{{ asset('/public/img/new/application.png') }}" class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="uppercase-font block font-13">Applications</span>
                                                    <span class="txt-dark1 block counter">
                                                        <span class="counter-anim" style="font-weight: bolder;">{{ $totalapplications }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    </div>
@endsection
