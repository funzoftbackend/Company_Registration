@extends('layouts.app')
<style>
	  @media (min-width:1000px) and (max-width:1200px){
        .zmdi.zmdi-menu{
            margin-left: 9px !important;
        }
    }
	@media(min-width:768px){
    .col-xs-6.text-center.pl-0.pr-0.data-wrap-right img{
        margin-left: 75px !important;

    }
    .row{
    padding-left: 10%;
    }
    }
	@media (min-width:1200px){
	.page-wrapper{
     min-height:1020px !important;
	}
	.zmdi.zmdi-menu{
            margin-top: 26px !important;
        }

	}
    .main-div{
        margin-top: -70px;
    }
	.page-wrapper{
        background: linear-gradient(180deg, #c5e2e2 0%, #FFFFFF 70%) !important;
	}
	.bg{
		background:linear-gradient(#248F4C, #176634) !important;
	}
     .ml-3{
         padding-top: 40px !important;
         margin-left:2% !important;
         margin-bottom:10px !important;
     }
     .brand-img{
         width:78.5px !important;
         height:53.5px !important;
     }
     .col-lg-3 {
  border: none !important;
  border-radius: 8px;
  margin-left: 2% !important;
  margin-bottom: 2% !important;
}
.txt-dark1 {
  color: white !important;
  font-weight:700;
}
.weight-500.uppercase-font.block.font-13{
    color: white !important;
}
.col-xs-6.text-center.pl-0.pr-0.data-wrap-right img{
    margin-left: 155px;
}
.main-div{
    height:100% !important;
    background: linear-gradient(180deg, #D2F0EA 0%, #FBFDFF 100%);
}
     /*.page-wrapper{*/
     /*    background:url('{{ asset('/public/img/pingwing.png') }}') !important;*/
     /*}*/
</style>
@section('content')
    <!-- Row -->
    <div class = "main-div">
    	<div class="row">
    	 <h5 class="ml-3">Dashboard</h5>
    		@if($user->user_role === 'superadmin')
    			<a href = "{{route('user.index')}}">
    				<div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
    					<div class="panel panel-default card-view pa-0">
    						<div class="panel-wrapper collapse in">
    							<div class="panel-body pa-0">
    								<div class="sm-data-box">
    									<div class="container-fluid">
    										<div class="row">
    											<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
    												<span class="txt-dark1 block counter"><span class="counter-anim">{{$totalusers}}</span></span>
    												<span class="weight-500 uppercase-font block font-13">Users</span>
    											</div>
    											<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
    											<img src = "{{ asset('/public/img/shield-user-fill.png') }}">
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</a>
    			<a href = "{{route('application.index')}}">
    				<div class="col-lg-3 bg  col-md-6 col-sm-6 col-xs-12">
    					<div class="panel panel-default card-view pa-0">
    						<div class="panel-wrapper collapse in">
    							<div class="panel-body pa-0">
    								<div class="sm-data-box">
    									<div class="container-fluid">
    										<div class="row">
    											<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
    												<span class="txt-dark1 block counter"><span class="counter-anim">{{$totalapplications}}</span></span>
    												<span class="weight-500 uppercase-font block font-13">Applications</span>
    											</div>
    											<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
    											<img src = "{{ asset('/public/img/form_svgrepo.com.png') }}">
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    		    </a>
    			<a href = "{{route('lead.index')}}">
    				<div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
    					<div class="panel panel-default card-view pa-0">
    						<div class="panel-wrapper collapse in">
    							<div class="panel-body pa-0">
    								<div class="sm-data-box">
    									<div class="container-fluid">
    										<div class="row">
    											<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
    												<span class="txt-dark1 block counter"><span class="counter-anim">{{$totalleads}}</span></span>
    												<span class="weight-500 uppercase-font block font-13">Leads</span>
    											</div>
    											<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
    												<img src = "{{ asset('/public/img/connection-pattern-1105_svgrepo.com.png') }}">
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</a>
    			<a href = "{{route('company.index')}}">
    				<div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
    					<div class="panel panel-default card-view pa-0">
    						<div class="panel-wrapper collapse in">
    							<div class="panel-body pa-0">
    								<div class="sm-data-box">
    									<div class="container-fluid">
    										<div class="row">
    											<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
    												<span class="txt-dark1 block counter"><span class="counter-anim">{{$totalcompanies}}</span></span>
    												<span class="weight-500 uppercase-font block font-13">Companies</span>
    											</div>
    											<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
    											<img src = "{{ asset('/public/img/Vector.png') }}">
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</a>
    			<a href = "{{route('transaction.index')}}">
    				<div class="col-lg-3 col-md-6 bg col-sm-6 col-xs-12">
    					<div class="panel panel-default card-view pa-0">
    						<div class="panel-wrapper collapse in">
    							<div class="panel-body pa-0">
    								<div class="sm-data-box">
    									<div class="container-fluid">
    										<div class="row">
    											<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
    												<span class="txt-dark1 block counter"><span class="counter-anim">{{$totaltransactions}}</span></span>
    												<span class="weight-500 uppercase-font block font-13">Transactions</span>
    											</div>
    											<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
    												<img src = "{{ asset('/public/img/arrow-left-right-line.png') }}">
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</a>
    			<a href = "{{route('partner.index')}}">
    				<div class="col-lg-3 bg col-md-6 col-sm-6 col-xs-12">
    					<div class="panel panel-default card-view pa-0">
    						<div class="panel-wrapper collapse in">
    							<div class="panel-body pa-0">
    								<div class="sm-data-box">
    									<div class="container-fluid">
    										<div class="row">
    											<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
    												<span class="txt-dark1 block counter"><span class="counter-anim">{{$totalpartners}}</span></span>
    												<span class="weight-500 uppercase-font block font-13">Partners</span>
    											</div>
    											<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
    												<img src = "{{ asset('/public/img/user-2-fill.png') }}">
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
    			<a href = "{{route('user.index')}}">
    				<div class="col-lg-3 col-md-6 bg col-sm-6 col-xs-12">
    					<div class="panel panel-default card-view pa-0">
    						<div class="panel-wrapper collapse in">
    							<div class="panel-body pa-0">
    								<div class="sm-data-box">
    									<div class="container-fluid">
    										<div class="row">
    											<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
    												<span class="txt-dark1 block counter"><span class="counter-anim">{{$totalapplications}}</span></span>
    												<span class="weight-500 uppercase-font block font-13">Applications</span>
    											</div>
    											<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
    												<img src = "{{ asset('/public/img/form_svgrepo.com.png') }}">
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
