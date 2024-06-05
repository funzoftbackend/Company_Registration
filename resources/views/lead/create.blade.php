@extends('layouts.app')
<style>
        @media (min-width: 1200px) { 
        .zmdi.zmdi-menu{
            margin-top: -16px;
        }
        .page-wrapper{
            min-height:1020px !important;
        }
    }
     @media (max-width: 400px) { 
        .form-row {
            width: 800px !important;
        }
        
    }
    @media (max-width:578px) { 
        .form-row{
            width: 900px !important;
        }
        .zmdi.zmdi-menu{
            margin-left: 26px;
            margin-top: 26px;
        }
        .page-wrapper{
            min-height:566px !important;
        }
        .m-1 {
        margin-left: -4% !important;
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
                    <div class="card-header">Create Lead</div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    <form method="POST" action="{{ route('lead.store')}}">
                            @csrf
                            <div class="form-row">
                                <div class = "row">
                                   <div class = "col-md-6">
                                        <div class="form-group">
                                           
                                            <label for="email">Email</label>
                                            <input id="email" type="text" placeholder="Email" class="m-22 text-center form-control" name="email" value="{{ old('email') }}" required>
                                            
                                        </div>
                                    </div>
                                     <div class = "col-md-6">
                                        <div class="form-group">
                                           
                                            <label for="phone_number">Phone Number</label>
                                            <input id="phone_number" type="text" placeholder="Phone Number" class="m-22 text-center form-control" name="phone_number" value="{{ old('phone_number') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="country" for="countries">Select Countries</label>
                                            <select id="countries1" class="m-2 text-center form-control" name="country_id" required>
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id}}" @if(old('country_id') == $country->id) selected @endif>{{ucfirst($country->name)}}</option>
                                                @endforeach
                                            </select>
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
