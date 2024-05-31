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
        .zmdi.zmdi-menu {
            margin-top: -16px;
        }
        .partner-row .form-control.text-center{
             width: 100% !important;
        }
        .partner-row {
            display: inline-block;
            width: 50%;
            padding: 0 5px;
            
        }
        .partner-row{
            margin-top: 6%;
        }
        .partner-row label{
            padding-top: 30% !important;
        }
        .m-6, #add-partner {
            margin-top: 1%;
        }
        .remove-partner {
            margin-left: 1% !important;
        }
        .m-2.text-center.form-control {
            margin-left: 15% !important;
        }
        .m-6.text-center.form-control {
            margin-left: 6%;
            padding-top: 5px;
        }
        .partner-row .m-6.text-center.form-control {
            margin-left: 65% !important;
        }
        .invalid-feedback {
            background: red;
            color: white;
        }
        .page-wrapper {
            min-height: 1020px !important;
        }
    }
    @media (max-width: 578px) { 
        .form-row {
            width: 836px !important;
        }
        .zmdi.zmdi-menu {
            margin-left: 26px;
            margin-top: 26px;
        }
        .btn.btn-primary {
            margin-left: 3%;
        }
        .m-1 {
            margin-left: 1% !important;
        }
        .m-2 {
            margin-left: 5% !important;
        }
        .m-233 {
            margin-left: 2% !important;
        }
        .form-control.text-center {
            width: 40%;
        }
        .form-group label {
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
                       
                        @if(isset($_GET['type']) && in_array($_GET['type'], [1, 2, 3]))  
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        <form method="POST" action="{{ route('save_details')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="row">
                                        <input id="country_id" type="hidden" class="m-6 text-center form-control" name="country_id" value="{{ $user->country_id }}" autofocus>
                                        <input id="user_id" type="hidden" class="m-6 text-center form-control" name="user_id" value="{{ $user_id }}" autofocus>
                                        <input id="type_id" type="hidden" class="m-6 text-center form-control" name="type_id" value="{{ $type }}" autofocus>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="company_name">Company Name</label>
                                                <input id="company_name" type="text" class="m-6 text-center form-control" placeholder="Company Name" name="company_name" autofocus>
                                                @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                        <!--<div class="col-md-6">-->
                                        <!--    <div class="form-group">-->
                                        <!--        <label for="owner_nationality">Owner Nationality</label>-->
                                        <!--        <input id="owner_nationality" type="text" class="m-6 text-center form-control" placeholder="Owner Nationality" name="owner_nationality" autofocus>-->
                                        <!--        @error('owner_nationality')-->
                                        <!--            <span class="invalid-feedback" role="alert">-->
                                        <!--                <strong>{{ $message }}</strong>-->
                                        <!--            </span>-->
                                        <!--        @enderror-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="financial_year_ending_date">Financial Year Ending Date</label>
                                                <input id="financial_year_ending_date" type="text" class="m-6 text-center form-control" placeholder="MM/DD" name="financial_year_ending_date" autofocus>
                                                @error('financial_year_ending_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="suggested_names">Suggested Names</label>
                                                <input id="suggested_names" type="text" class="m-6 text-center form-control" placeholder="Suggested Names" name="suggested_names" autofocus>
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
                                                <input id="activities" type="text" class="m-6 text-center form-control" placeholder="Activities" name="activities" autofocus>
                                                @error('activities')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="number_of_partners">Number of Partners</label>
                                                <input id="number_of_partners" type="number" class="m-6 text-center form-control" placeholder="Number of Partners" name="number_of_partners" min="1" autofocus>
                                                @error('number_of_partners')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Partners Section -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="partners">Partners</label>
                                                <div id="partners-wrapper"></div>
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
        function updatePartnerDetails() {
            var numberOfPartners = document.getElementById('number_of_partners').value;
            var partnersWrapper = document.getElementById('partners-wrapper');
            partnersWrapper.innerHTML = '';
        
            for (var i = 1; i <= numberOfPartners; i++) {
                var partnerDiv = document.createElement('div');
                partnerDiv.className = 'partner-row';
                partnerDiv.innerHTML = `
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="partners_name">Partner ${i} Name</label>
                            <input type="text" class="m-6 text-center form-control" placeholder="Partner ${i} Name " name="partners_name[]" autofocus>
                        </div>
                        <div class="col-md-6">
                            <label for="partner_nationality">Partner ${i} Nationality</label>
                            <input type="text" class="m-6 text-center form-control" placeholder="Partner ${i} Nationality" name="partner_nationality[]" autofocus>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="partner_passport_no">Partner ${i} Passport No</label>
                            <input type="text" class="m-6 text-center form-control" placeholder="Partner ${i} Passport No" name="partner_passport_no[]" autofocus>
                        </div>
                        <div class="col-md-6">
                            <label for="partner_passport_date_of_expiry">Partner ${i} Passport Date of Expiry</label>
                            <input type="date" class="m-6 text-center form-control" placeholder="Partner ${i} Passport Date of Expiry" name="partner_passport_date_of_expiry[]" autofocus>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="partner_date_of_birth">Partner ${i} Date of Birth</label>
                            <input type="date" class="m-6 text-center form-control" placeholder="Partner ${i} Date of Birth" name="partner_date_of_birth[]" autofocus>
                        </div>
                        <div class="col-md-6">
                            <label for="partner_passport_date_of_issue">Partner ${i} Passport Date of Issue</label>
                            <input type="date" class="m-6 text-center form-control" placeholder="Partner ${i} Passport Date of Issue" name="partner_passport_date_of_issue[]" autofocus>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="partners_url">Partner ${i} Passport Urls</label>
                            <input type="file" class="m-6 text-center form-control" name="partners_url[]" autofocus>
                        </div>
                        <div class="col-md-6">
                            <label for="partners_designation">Partner ${i} Designation</label>
                            <input type="text" class="m-6 text-center form-control" placeholder="Partner ${i} Designation" name="partners_designation[]" autofocus>
                        </div>
                    </div>
                `;
                partnersWrapper.appendChild(partnerDiv);
            }
        }
        document.getElementById('number_of_partners').addEventListener('change', updatePartnerDetails);
        document.getElementById('number_of_partners').addEventListener('input', updatePartnerDetails);

</script>
@endsection
