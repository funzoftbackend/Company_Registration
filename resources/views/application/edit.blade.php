@extends('layouts.app')
<style>
    @media (max-width: 400px) { 
        .form-row {
            width: 800px !important;
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
            width:40% !important;
        }
        .form-group label{
        padding-right: 7%;
        }
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Application</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('application.update',$application->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                           
                                            <label for="user_id">Application Submitted By</label>
                                            <select id="user_id" class="m-1 text-center form-control" name="user_id" required>
                                                 @foreach($users as $user)
                                                <option value="{{$user->id}}" {{ $user->id === $application->user->id ? 'selected' : '' }}>{{ucfirst($user->name)}}</option>
                                                 @endforeach
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select id="type" class="m-1 text-center form-control" name="type" required>
                                                @foreach($domains as $domain)
                                                <option value="{{$domain->id}}" {{ $domain->id === $application->type ? 'selected' : '' }}>{{ucfirst($domain->name)}}</option>
                                                @endforeach
                                        @error('type')
                                            </select>
                                        @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class = "col-md-6">
                                    <div class="form-group">
                                        <label for="payment_status">Payment Status</label>
                                        <input id="payment_status" type="text" class="m-6 text-center form-control" placeholder="Payment Status" name="payment_status" value="{{ $application->payment_status }}" required autofocus>
                                        @error('payment_status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
