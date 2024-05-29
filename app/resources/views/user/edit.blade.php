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
                    <div class="card-header">Update User</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update',$user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class = "row">
                                    <div class = "col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="m-2 text-center form-control" placeholder="Name" name="name" value="{{ $user->name }}" required autofocus>
                                    </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="m-2 text-center form-control" placeholder="Email" name="email" value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <label for="user_role">User Role</label>
                                            <select id="user_role" class="m-1 text-center form-control" name="user_role" required>
                                                @foreach($country_steps as $step)
                                                <option {{ $user->user_role === $step ? 'selected' : '' }} value="{{$step}}"       >{{$step}}</option>
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
                                            <input id="mobile_no" type="text" placeholder="Mobile Number" class="m-22 text-center form-control" name="mobile_no" value="{{ $user->mobile_no }}" >
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                    <div class="form-group">
                                            <label for="country">Country</label>
                                            <input id="country" type="text" placeholder="Country" class="m-233 text-center form-control" name="country" value="{{ $user->country }}" >
                                        </div>
                                    </div>
                                     <div class = "col-md-6">
                                    <div class="form-group">
                                        <label for="name">Package Name</label>
                                        <input id="name" type="text" class="m-6 text-center form-control" placeholder="Package Name" name="package_name" value="{{ $user->package_name }}" autofocus>
                                    </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                        <label for="email">Package Price</label>
                                        <input id="package_price" type="number" class="m-5 text-center form-control" placeholder="Package Price" name="package_price" value="{{ $user->package_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                    @if($user->passport_one_img)
                                                <img src="{{ $user->passport_one_img }}" alt="Passport Front" class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                    <div class="col-md-6">
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
                                    @if($user->passport_two_img)
                                                <img src="{{ $user->passport_two_img }}" alt="Passport Back" class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                    <div class = "col-md-6">
                                    <div class="form-group">
                                            <label for="country">Amount</label>
                                            <input id="amount" type="number" placeholder="Amount" class="m-233 text-center form-control" name="amount" value="{{ $user->amount }}" >
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                    <div class="form-group">
                                            <label for="amount_type">Country</label>
                                            <input id="amount_type" type="text" placeholder="Amount Type" class="m-233 text-center form-control" name="amount_type" value="{{ $user->amount_type }}" >
                                        </div>
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
