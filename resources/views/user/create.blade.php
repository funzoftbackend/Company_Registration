@extends('layouts.app')
<style>
     
    @media (max-width: 400px) { 
        .form-row {
            width: 990px !important;
        }
        
    }
    @media (max-width:578px) { 
        .form-row{
            width: 1170px !important;
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
                    <div class="card-header">Create User</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }} " enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class = "row">
                                    <div class = "col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="m-2 text-center form-control" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="m-2 text-center form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="user_role">User Role</label>
                                            <select id="user_role" class="m-1 text-center form-control" name="user_role" required>
                                                @foreach($country_steps as $step)
                                                <option value="{{$step}}"       >{{$step}}</option>
                                                @endforeach
                                            </select>
                                            @error('user_role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label  for="mobile_no">Mobile No</label>
                                            <input id="mobile_no" type="text" placeholder="Mobile Number" class="m-22 text-center form-control" name="mobile_no" value="{{ old('mobile_no') }}" >
                                            @error('mobile_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input id="country" type="text" placeholder="Country" class="m-233 text-center form-control" name="country" value="{{ old('country') }}" >
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="package_name">Package Name</label>
                                            <input id="package_name" type="text" class="m-6 text-center form-control" placeholder="Package Name" name="package_name" value="{{ old('package_name') }}"  autofocus>
                                            @error('package_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="package_price">Package Price</label>
                                            <input id="package_price" type="number" class="m-5 text-center form-control" placeholder="Package Price" name="package_price" value="{{ old('package_price') }}">
                                            @error('package_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="passport_one_img">Passport Front</label>
                                                <input id="passport_one_img" type="file" accept="image/*" class="m-5 text-center form-control" name="passport_one_img">
                                                @error('passport_one_img')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="passport_two_img">Passport Back</label>
                                                <input id="passport_two_img" type="file" accept="image/*" class="m-5 text-center form-control" name="passport_two_img">
                                                @error('passport_two_img')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="country">Amount</label>
                                            <input id="amount" type="number" placeholder="Amount" class="m-233 text-center form-control" name="amount" value="{{ old('amount') }}">
                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="amount_type">Country</label>
                                        <input id="amount_type" type="text" placeholder="Amount Type" class="m-233 text-center form-control" name="amount_type" value="{{ old('amount_type') }}">
                                            @error('amount_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               

                                

                                
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
