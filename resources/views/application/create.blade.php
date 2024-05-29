@extends('layouts.app')
<style>
    @media (max-width: 400px) { 
        .form-row {
            width: 800px !important;
        }
          .form-control.text-center {
            width: 37% !important;
          }
        
    }
    @media (min-width:1000px) { 
        .zmdi.zmdi-menu{
            margin-top: -16px;
        }
         .m-2.text-center.form-control {
        margin-left: 15% !important;
      }
      .m-6.text-center.form-control {
        margin-left: 6% !important;
      }
        .page-wrapper{
            min-height:1020px !important;
        }
    }
    @media (max-width:578px) { 
        .form-row{
            width: 836px !important;
        }
        .zmdi.zmdi-menu{
            margin-left: 26px;
            margin-top: 26px;
        }
        .btn.btn-primary{
        margin-left: 3%;
        }
        .m-1 {
        margin-left: 1% !important;
        }
        .m-2 {
        margin-left: 5% !important;
        }
        .m-233{
        margin-left: 2% !important;
        }
        .form-control.text-center{
            width:40%;
        }
        .form-group label{
        padding-right: 7%;
        }
    }
</style>
@section('content')
    <div class="main-div">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Application</div>

                    <div class="card-body">
                     @if($user->user_role != 'Lead Manager')
                    <form method="POST" action="{{ route('application.store')}}">
                    @csrf
                    @else
                    <form method = "GET" action="{{ route('manager_domain_check')}}">
                    @endif

                            <div class="form-row">
                                <div class = "row">
                                    @if($user->user_role != 'Lead Manager')
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                         
                                            
                                            <label for="user_id">Application Submitted By</label>
                                            <select id="user_id" class="m-1 text-center form-control" name="user_id" required>
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}" {{ $user->id === old('user_id') ? 'selected' : '' }}>{{ucfirst($user->name)}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    @endif
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                               <select id="type" class="m-2 text-center form-control" name="type" required>
                                                    @foreach($domains as $domain)
                                                    <option value="{{$domain->id}}" {{ $domain->id === old('type') ? 'selected' : '' }}>{{ucfirst($domain->name)}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="payment_status">Payment Status</label>
                                            <input id="payment_status" type="text" class="m-6 text-center form-control" placeholder="Payment Status" name="payment_status" value="50" autofocus>
                                            @error('payment_status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                            <button type="submit" class="ml-2 btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
