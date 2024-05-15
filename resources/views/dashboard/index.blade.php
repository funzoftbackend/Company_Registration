@extends('layouts.app')
<style>
    @media (min-width: 1000px) and (max-width: 1200px) {
        .zmdi.zmdi-menu {
            margin-left: 9px !important;
        }
    }

    @media (min-width: 768px) {
        .col-xs-6.text-center.pl-0.pr-0.data-wrap-right img {
            margin-left: 75px !important;
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
    @media (min-width: 1600px) and (max-width:3300px){
        .main-div{
            width: 1600px !important;
            position:  relative !important;
        }
        .right-img{
            margin-right: -81px !important;
            margin-top: -76px !important;
        }

    }

    @media (max-width: 550px) {
        .zmdi.zmdi-menu {
            top: 50px !important;
        }
        .main-div {
            position: relative !important;
            width: 347px !important;
            height: 1000px !important;
            left: 11px !important;
        }
        .right_img {
            float: right;
            margin-right: 7% !important;
            margin-top: -10% !important;
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

        .main-div {
            height: auto !important;
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
        margin-bottom: -13px !important;
        margin-top: 45px;
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
        position: relative !important;
        height: 100% !important;
        background: white;
        width: 1240px;
        top: -66px;
        left: 0px;
        border-radius: 20px;
        box-shadow: 0 0 20px 0 rgba(28, 113, 255, 0.35);
    }

    .img-responsive {
        width: 50px;
        height: 50px;
        margin-left: 60px;
        margin-top: 34px;
    }

    .application-div .img-responsive {
        margin-top: 51px;
        margin-left: 77px !important;
    }

    .page-wrapper {
        background: #e8f1fe !important;
    }
</style>

@section('content')
    <!-- Row -->
    <div class = "main-div">
        <div class="row">
            @if ($user->user_role === 'superadmin')
                <a href = "{{ route('user.index') }}">
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
                                                    <span class=" uppercase-font block font-13">Applications</span>
                                                    <span class="txt-dark1 block counter"><span class="counter-anim" style="font-weight: bolder;">{{ $totalapplications }}</span></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href = "{{ route('application.index') }}">
                    <div class="col-lg-3 bg  col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <img src = "{{ asset('/public/img/new/leads.png') }}"
                                                        class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class=" uppercase-font block font-13">Leads</span>
                                                    <span class="txt-dark1 block counter"><span
                                                            class="counter-anim" style="font-weight: bolder;">{{ $totalleads }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href = "{{route('countries.index')}}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <img src = "{{ asset('/public/img/new/countries.png') }}"
                                                        class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">

                                                    <span class=" uppercase-font block font-13">Countries</span>
                                                    <span class="txt-dark1 block counter"><span
                                                            class="counter-anim" style="font-weight: bolder;">{{ $totalcountries }}</span></span>                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href = "{{ route('lead.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <img src = "{{ asset('/public/img/new/companies.png') }}"
                                                        class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">

                                                    <span class=" uppercase-font block font-13">Companies</span>
                                                    <span class="txt-dark1 block counter"><span
                                                            class="counter-anim" style="font-weight: bolder;">{{ $totalcompanies }}</span></span>                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href = "{{ route('company.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <img src = "{{ asset('/public/img/new/users.png') }}"
                                                        class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class=" uppercase-font block font-13">Users</span>
                                                    <span class="txt-dark1 block counter"><span
                                                            class="counter-anim" style="font-weight: bolder;">{{ $totalusers }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href = "{{ route('transaction.index') }}">
                    <div class="col-lg-3 col-md-6 bg col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <img src = "{{ asset('/public/img/new/transections.png') }}"
                                                        class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span
                                                        class=" uppercase-font block font-13">Transactions</span>
                                                    <span class="txt-dark1 block counter"><span
                                                            class="counter-anim" style="font-weight: bolder;">{{ $totaltransactions }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href = "{{ route('partner.index') }}">
                    <div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <img src = "{{ asset('/public/img/new/partners.png') }}"
                                                        class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class=" uppercase-font block font-13">Partners</span>
                                                    <span class="txt-dark1 block counter"><span
                                                            class="counter-anim" style="font-weight: bolder;">{{ $totalpartners }}</span></span>
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
                <a href = "{{ route('user.index') }}">
                    <div class="col-lg-3 col-md-6 bg col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <img src = "{{ asset('/public/img/form_svgrepo.com.png') }}"
                                                        class="img-responsive" alt="Application Image">
                                                </div>
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class=" uppercase-font block font-13">Partners</span>
                                                    <span class="txt-dark1 block counter"><span
                                                            class="counter-anim" style="font-weight: bolder;">{{ $totalpartners }}</span></span>
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
