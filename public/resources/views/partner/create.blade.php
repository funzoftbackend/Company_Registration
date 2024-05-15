@extends('layouts.app')
<style>
 
    @media (min-width: 1200px) { 
        .zmdi.zmdi-menu{
            margin-top: 26px;
        }
            .m-2.text-center.form-control{
        margin-left: -2% !important;
        }
        .m-55{
        margin-left: -5% !important;
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
    @media(min-width:1000px) and (max-width:1200px){
             .m-2.text-center.form-control{
        margin-left: 10% !important;
        }
        .m-55.text-center.form-control{
        margin-left: 5% !important;
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
                    <div class="card-header">Create Partner</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('partner.store') }} ">
                            @csrf

                            <div class="form-row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_id">Company</label>
                                        <select id="company_id" class="m-55 text-center form-control" name="company_id" required>
                                            @foreach($companies as $company)
                                            <option value="{{$company->id}}" @if(old('company_id') == $company->id) selected @endif>{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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
                                        <label for="passport_url">Passport Url</label>
                                        <input id="passport_url" type="text" class="m-77 text-center form-control" placeholder="Passport Url" name="passport_url" value="{{ old('passport_url') }}" required>
                                        @error('passport_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input id="designation" type="text" class="m-77 text-center form-control" placeholder="Designation" name="designation" value="{{ old('designation') }}" required>
                                        @error('designation')
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
