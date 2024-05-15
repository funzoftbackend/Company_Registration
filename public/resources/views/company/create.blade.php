@extends('layouts.app')
<style>
 
    @media (min-width: 1200px) { 
        .zmdi.zmdi-menu{
            margin-top: 26px;
        }
        .form-group label {
    padding-right: 10%;
    }
        .page-wrapper{
            min-height:1020px !important;
        }
    }
    @media (max-width: 400px) { 
        .form-row {
            width: 990px !important;
        }
        
    }
    @media (min-width: 1200px) {
  .form-group label {
    padding-right: 15% !important;
  }
}
    @media (max-width:578px) { 
        .form-row{
            width: 900px !important;
        }
        .m-14{
            width:40% !important;
        }
        .m-1 {
        margin-left: 1% !important;
        }
        .zmdi.zmdi-menu{
            margin-left: 26px;
            margin-top: 26px;
        }
        .m-2 {
        margin-left: 5% !important;
        }
        .m-233{
        margin-left: 2% !important;
        }
        .form-group label{
        padding-right: 0% !important;
        }
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Company</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('company.store') }} ">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="capital">Capital</label>
                                        <input id="capital" type="text" class="m-11 text-center form-control" placeholder="Capital" name="capital" value="{{ old('capital') }}" required>
                                        @error('capital')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency">Currency</label>
                                        <input id="currency" type="text" class="m-0 text-center form-control" placeholder="Currency" name="currency" value="{{ old('currency') }}" required>
                                        @error('currency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number_of_partners">Number of Partners</label>
                                        <input id="number_of_partners" type="number" class="m-66 text-center form-control" placeholder="Number of Partners" name="number_of_partners" value="{{ old('number_of_partners') }}" required>
                                        @error('number_of_partners')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="owner_nationality">Owner Nationality</label>
                                        <input id="owner_nationality" type="text" class="m-77 text-center form-control" placeholder="Owner Nationality" name="owner_nationality" value="{{ old('owner_nationality') }}" required>
                                        @error('owner_nationality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_type">Company Type</label>
                                        <input id="company_type" type="text" class="m-55 text-center form-control" placeholder="Company Type" name="company_type" value="{{ old('company_type') }}" required>
                                        @error('company_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="financial_year_ending_date">Financial Year Ending Date</label>
                                        <input id="financial_year_ending_date" type="date" class="m-14 text-center form-control" placeholder="Financial Year Ending Date" name="financial_year_ending_date" value="{{ old('financial_year_ending_date') }}" required>
                                        @error('financial_year_ending_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" class="m-2 text-center form-control" name="status" required>
                                            <option value="approved" @if(old('status') == 'approved') selected @endif>Approved</option>
                                            <option value="rejected" @if(old('status') == 'rejected') selected @endif>Rejected</option>
                                            <option value="pending" @if(old('status') == 'pending') selected @endif>Pending</option>
                                            <option value="paused" @if(old('status') == 'paused') selected @endif>Paused</option>
                                            <option value="requested" @if(old('status') == 'requested') selected @endif>Requested</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suggested_names">Suggested Names</label>
                                        <input id="suggested_names" type="text" class="m-77 text-center form-control" placeholder="Suggested Names" name="suggested_names" value="{{ old('suggested_names') }}" required>
                                        @error('suggested_names')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="activities">Activities</label>
                                        <input id="activities" type="text" class="text-center form-control" placeholder="Activities" name="activities" value="{{ old('activities') }}" required>
                                        @error('activities')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="application_id">Application ID</label>
                                        
                                        <select id="application_id" class="m-4 text-center form-control" name="application_id" required>
                                            @foreach($applications as $application)
                                            <option value="{{$application->id}}" @if(old('application_id') == $application->id) selected @endif>{{$application->id}}</option>
                                             @endforeach
                                        </select>
                                       
                                          @error('application_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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