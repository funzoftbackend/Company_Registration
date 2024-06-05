@extends('layouts.app')
<style>
<style>
    @media (max-width: 400px) { 
        .form-row {
            width: 800px !important;
        }
        .form-control.text-center {
            width: 37% !important;
        }
    }
    @media (min-width: 1000px) { 
        .zmdi.zmdi-menu {
            margin-top: -16px;
        }
        #transaction-form .form-group label {
            padding-right: 15% !important;
          }
          #currency1{
            width: 15%;
            margin-left: 1% !important;
        }
        .m-2.text-center.form-control {
            margin-left: 15% !important;
        }
        .m-6.text-center.form-control {
            margin-left: 6% !important;
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
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if($user->user_role != 'Lead Manager')
                        <form method="POST" action="{{ route('application.store') }}">
                        @csrf
                    @else
                        <form method="GET" action="{{ route('manager_domain_check') }}">
                    @endif
                        <div class="form-row">
                            <div class="row">
                                @if($user->user_role == 'Lead Manager')
                                    <input id="user_id" type="hidden" class="m-6 text-center form-control" name="user_id" value="{{ $lead_user->id }}" autofocus>
                                @endif
                                @if($user->user_role != 'Lead Manager')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_id">Application Submitted By</label>
                                            <select id="user_id" class="m-1 text-center form-control" name="user_id" required>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" {{ $user->id === old('user_id') ? 'selected' : '' }}>{{ ucfirst($user->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="country_id" for="countries">Select Countries</label>
                                        <select id="countries1" class="m-2 text-center form-control" name="country_id" required>
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" @if($lead_user->country_id == $country->id) selected @endif>{{ ucfirst($country->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Choose Application Type</label>
                                        <select id="type" class="m-2 text-center form-control" name="type" required>
                                            @foreach($domains as $domain)
                                                <option value="{{ $domain->id }}" {{ $domain->id === old('type') ? 'selected' : '' }}>{{ ucfirst($domain->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="role-form-group form-group">
                                        <label for="package_name">Packages</label><br>
                                        <div class="package_name">
                                            <input type="radio" id="package_standard" name="package_name[]" value="Standard">
                                            <label for="package_standard">Standard</label><br>
                                            <input type="radio" id="package_premium" name="package_name[]" value="Premium">
                                            <label for="package_premium">Premium</label><br>
                                            <input type="radio" id="package_gold" name="package_name[]" value="Gold">
                                            <label for="package_gold">Gold</label><br>
                                        </div>
                                        @error('package_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="transaction-form" style="display: none;">
                                 <div class="col-md-6">
                                     <input type="hidden" id="total_amount" name="total_amount" value="">
                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <input id="amount" type="number" class="m-11 text-center form-control" placeholder="Amount" name="amount" value="" readonly><select id="currency1" class="m-6 text-center form-control" name="currency" autofocus>
                                                    <option value="USD">USD</option>
                                                    <option value="SAR">SAR</option>
                                                    <option value="OMR">OMR</option>
                                                    <option value="BHD">BHD</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="method">Method</label>
                                                <input id="method" type="text" class="m-66 text-center form-control" placeholder="Method" name="method" value="Manual" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tid">Transaction Id</label>
                                                <input id="tid" type="text" class="m-77 text-center form-control" placeholder="Transaction Id" name="tid" value="{{ old('tid') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ml-2 btn btn-primary">Create</button>
                        </form>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const packageRadios = document.querySelectorAll('.package_name input[type="radio"]');
    const transactionForm = document.getElementById('transaction-form');
    const amountField = document.getElementById('amount');
    const totalAmountField = document.getElementById('total_amount');
    const domainSelect = document.getElementById('type');

    packageRadios.forEach(radio => {
        radio.addEventListener('change', updateAmount);
    });
    domainSelect.addEventListener('change', updateAmount);

    async function updateAmount() {
        const selectedPackage = Array.from(packageRadios).find(rb => rb.checked)?.value;
        const domainId = domainSelect.value;

        if (selectedPackage && domainId) {
            try {
                const response = await fetch(`/get-package-prices?domain_id=${domainId}&package=${selectedPackage}`);
                const prices = await response.json();

                const packagePrice = prices[selectedPackage];

                if (packagePrice) {
                    const fiftyPercentAmount = packagePrice * 0.5;
                    amountField.value = fiftyPercentAmount;
                    totalAmountField.value = packagePrice;

                    transactionForm.style.display = 'block';
                } else {
                    console.error('Package price not found.');
                }
            } catch (error) {
                console.error('Error fetching package prices:', error);
            }
        } else {
            amountField.value = '';
            totalAmountField.value = '';
            transactionForm.style.display = 'none';
        }
    }
});


</script>

@endsection
