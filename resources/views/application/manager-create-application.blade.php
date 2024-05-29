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
        .m-6,#add-partner{
            margin-top:1%;
        }
        .remove-partner{
            margin-left: 1% !important;
        }
         .m-2.text-center.form-control {
        margin-left: 15% !important;
      }
      .m-6.text-center.form-control {
        margin-left: 6% !important;
      }
      .invalid-feedback{
            background:red;
            color:white;
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
                       
                        @if(isset($_GET['type']) && $_GET['type'] == 1 || $_GET['type'] == 2 || $_GET['type'] == 3)  
                        <form method="POST" action="{{ route('save_details')}}">
                                @csrf
                                <div class="form-row">
                                    <div class = "row">
                                        <input id="country_id" type="hidden" class="m-6 text-center form-control" name="country_id" value="{{$user->country_id}}" autofocus>
                                        <input id="type_id" type="hidden" class="m-6 text-center form-control" name="type_id" value="{{$type}}" autofocus>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="company_name">Company Name</label>
                                                <input id="company_name" type="text" class="m-6 text-center form-control" placeholder="Company Name" name="company_name"  autofocus>
                                                @error('company_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="capital">Company Capital</label>
                                                <input id="capital" type="text" class="m-6 text-center form-control" placeholder="Capital" name="capital" autofocus>
                                                
                                                @error('capital')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="currency">Company Currency</label>
                                                <input id="currency" type="text" class="m-6 text-center form-control" placeholder="Currency" name="currency" autofocus>
                                                @error('currency')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="number_of_partners">Number of Partners</label>
                                                <input id="number_of_partners" type="number" class="m-6 text-center form-control" placeholder="Number of Partners" name="number_of_partners" autofocus>
                                                @error('number_of_partners')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="owner_nationality">Owner Nationality</label>
                                                <input id="owner_nationality" type="text" class="m-6 text-center form-control" placeholder="Owner Nationality" name="owner_nationality" autofocus>
                                                @error('owner_nationality')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="company_type">Company Type</label>
                                                <input id="company_type" type="text" class="m-6 text-center form-control" placeholder="Company Type" name="company_type" autofocus>
                                                @error('company_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="financial_year_ending_date">Financial Year Ending Date</label>
                                                <input id="financial_year_ending_date" type="text" class="m-6 text-center form-control" placeholder="Financial Year Ending Date" name="financial_year_ending_date" autofocus>
                                                @error('financial_year_ending_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="suggested_names">Suggested Names</label>
                                                <input id="suggested_names" type="text" class="m-6 text-center form-control" placeholder="Suggested Names" name="suggested_names"  autofocus>
                                                @error('suggested_names')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="activities">Activities</label>
                                                <input id="activities" type="text" class="m-6 text-center form-control" placeholder="Activities" name="activities"  autofocus>
                                                @error('activities')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Partners Section -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="partners">Partners</label>
                                                <div id="partners-wrapper">
                                                    <div class="partner-row">
                                                        <input type="text" class="m-6 text-center form-control" placeholder="Partner Name" name="partners_name[]" autofocus>
                                                        <input type="text" class="m-6 text-center form-control" placeholder="Partner Nationality" name="partner_nationality[]" autofocus>
                                                        <input type="text" class="m-6 text-center form-control" placeholder="Partner Passport No" name="partner_passport_no[]" autofocus>
                                                        <input type="text" class="m-6 text-center form-control" placeholder="Partner Passport Date of Expiry" name="partner_passport_date_of_expiry[]" autofocus>
                                                        <input type="text" class="m-6 text-center form-control" placeholder="Partner Date of Birth" name="partner_date_of_birth[]" autofocus>
                                                        <input type="text" class="m-6 text-center form-control" placeholder="Partner Passport Date of Issue" name="partner_passport_date_of_issue[]" autofocus>
                                                        <input type="text" class="m-6 text-center form-control" placeholder="Partner Passport URL" name="partners_url[]" autofocus>
                                                        <input type="text" class="m-6 text-center form-control" placeholder="Partner Designation" name="partners_designation[]" autofocus>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-success" id="add-partner">Add Partner</button>
                                            </div>
                                        </div>
                                    <!-- End Partners Section -->
                                <button type="submit" class="ml-2 btn btn-primary">Create</button>
                        </form>
                        @else
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('save_details')}}">
                                @csrf
                                <div class="form-row">
                                    <div class = "row">
                                        <input id="country_id" type="hidden" class="m-6 text-center form-control" name="country_id" value="{{$user->country_id}}" autofocus>
                                        <input id="type_id" type="hidden" class="m-6 text-center form-control" name="type_id" value="{{$type}}" autofocus>
                                        <div class = "col-md-6">
                                            <div class="form-group">
                                                <label for="CRN">Company Registration Number</label>
                                                <input id="CRN" type="text" class="m-6 text-center form-control" placeholder="Company Registration Number" name="CRN"  autofocus><br>
                                                @if(session('error'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ session('message') }}</strong>
                                                        </span>
                                                @endif
                                                
                                                
                                            </div>
                                        </div>
                                <button type="submit" class="ml-2 btn btn-primary">Verify</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <script>
        document.getElementById('add-partner').addEventListener('click', function () {
            var wrapper = document.getElementById('partners-wrapper');
            var index = wrapper.querySelectorAll('.partner-row').length + 1;
            var partnerRow = document.createElement('div');
            partnerRow.classList.add('partner-row');
            partnerRow.innerHTML = `
                <input type="text" class="m-6 text-center form-control" placeholder="Partner Name ${index}" name="partners_name[]" autofocus>
                <input type="text" class="m-6 text-center form-control" placeholder="Partner Nationality ${index}" name="partner_nationality[]" autofocus>
                <input type="text" class="m-6 text-center form-control" placeholder="Partner Passport No ${index}" name="partner_passport_no[]" autofocus>
                <input type="text" class="m-6 text-center form-control" placeholder="Partner Passport Date of Expiry ${index}" name="partner_passport_date_of_expiry[]" autofocus>
                <input type="text" class="m-6 text-center form-control" placeholder="Partner Date of Birth ${index}" name="partner_date_of_birth[]" autofocus>
                <input type="text" class="m-6 text-center form-control" placeholder="Partner Passport Date of Issue ${index}" name="partner_passport_date_of_issue[]" autofocus>
                <input type="text" class="m-6 text-center form-control" placeholder="Partner Passport URL ${index}" name="partners_url[]" autofocus>
                <input type="text" class="m-6 text-center form-control" placeholder="Partner Designation ${index}" name="partners_designation[]" autofocus>
                <button type="button" class="btn btn-danger remove-partner">Remove</button>
            `;
            wrapper.appendChild(partnerRow);

            partnerRow.querySelector('.remove-partner').addEventListener('click', function () {
                partnerRow.remove();
            });
        });

        document.querySelectorAll('.remove-partner').forEach(function (button) {
            button.addEventListener('click', function () {
                button.parentElement.remove();
            });
        });
    </script>
@endsection
