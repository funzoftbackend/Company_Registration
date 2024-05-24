@extends('layouts.app')
<style>
    @media (min-width: 1200px) {
        .price-section,.new{
            padding-top: 2%;
            padding-bottom: 2%;
        }
        .add-price-field{
            margin-top: 2% !important;
            padding-bottom: 2% !important;
        }
        .zmdi.zmdi-menu{
            margin-top: -16px;
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
        .domain.form-control{
            margin-left: -11px;
        }
        .form-group label.country {
            padding-right: 0% !important;
        }
        .form-group label.name {
            padding-right: 8% !important;
        }
        #countries{
            height: auto;
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
<div class="main-div">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Service Domains</div>
                <div class="card-body">
                    @if(isset($_GET['service_id']))
                    <form method="POST" action="{{ route('domain.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group domain">
                                    <label for="domains">Domain</label>
                                    <input id="service_id" type="hidden" class="form-control" value="{{ $_GET['service_id'] }}" name="service_id">
                                    @php
                                    $country_ids = urldecode($_GET['country_ids']);
                                    $country_ids = explode(',', $country_ids);
                                    @endphp
                                    @foreach($country_ids as $country)
                                    <input id="countries" type="hidden" class="form-control" value="{{$country}}" name="countries[]">
                                    @endforeach
                                    <div id="service_domains">
                                        <div class="domain-section">
                                            <div class="form-group domain">
                                                <label for="domain_1">Domain 1</label>
                                                <input id="domain_1" type="text" class="domain form-control" value="{{ old('domains[1]') }}" required name="domains[]" placeholder="Domain Name">
                                            </div>
                                            <div class="price-section" data-domain="1">
                                                <input type="text" class="form-control" name="prices[1][]" placeholder="Price">
                                                <select class="form-control" name="unit[1][]">
                                                    <option value="USD">USD</option>
                                                </select>
                                                <select class="form-control" name="package_name[1][]">
                                                    <option value="Standard">Standard</option>
                                                    <option value="Premium">Premium</option>
                                                    <option value="Gold">Gold</option>
                                                </select>
                                                <button type="button" class="btn btn-success add-price-field">Add Price</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success" id="add_domain">Add Domain</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                    <form method="POST" action="{{ route('service.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="name" for="service_name">Name</label>
                                    <input id="service_name" type="text" class="m-2 text-center form-control" placeholder="Name" name="service_name" value="{{ old('service_name') }}" required autofocus>
                                    @error('service_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="country" for="countries">Select Countries</label>
                                    <select id="countries" class="m-2 text-center form-control" name="countries[]" multiple required>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id}}" @if(old('countries') == $country->id) selected @endif>{{ucfirst($country->name)}}</option>
                                        @endforeach
                                    </select>
                                    @error('countries')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="country" for="select-all-countries">Select All Countries</label>
                                <input id="select-all-countries" type="checkbox" name="select_all_countries">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
@if(isset($_GET['service_id']))
document.addEventListener('DOMContentLoaded', function() {
    let domainCount = 1;
    let priceCounts = {1: 1}; // Track price fields for each domain

    // Function to create a new domain section
    function createDomainSection(domainCount) {
        return `
            <div class="domain-section" data-domain="${domainCount}">
                <div class="form-group domain">
                    <label for="domain_${domainCount}">Domain ${domainCount}</label>
                    <input id="domain_${domainCount}" type="text" class="domain form-control" name="domains[]" placeholder="Domain Name ${domainCount}" required>
                    <button type="button" class="btn btn-danger delete-domain">Delete Domain</button>
                </div>
                <div class="price-section" data-domain="${domainCount}">
                    <input type="text" class="form-control" name="prices[${domainCount}][]" placeholder="Price">
                    <select class="form-control" name="unit[${domainCount}][]">
                        <option value="USD">USD</option>
                    </select>
                    <select class="form-control" name="package_name[${domainCount}][]">
                        <option value="Standard">Standard</option>
                        <option value="Premium">Premium</option>
                        <option value="Gold">Gold</option>
                    </select>
                    <button type="button" class="btn btn-success add-price-field">Add Price</button>
                    <button type="button" class="btn btn-danger delete-price-field">Delete Price</button>
                </div>
            </div>`;
    }

    // Add new domain section
    document.getElementById('add_domain').addEventListener('click', function() {
        domainCount++;
        priceCounts[domainCount] = 1; // Initialize price fields count for new domain
        var domainDiv = document.createElement('div');
        domainDiv.innerHTML = createDomainSection(domainCount);
        document.getElementById('service_domains').appendChild(domainDiv);
    });

    // Add event listener for dynamically added price fields
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('add-price-field')) {
            let domainSection = event.target.closest('.price-section');
            let domainId = domainSection.getAttribute('data-domain');
            priceCounts[domainId]++;
            var priceDiv = document.createElement('div');
            priceDiv.classList.add('price-field');
            priceDiv.innerHTML = `
                <div class="new">
                    <input type="text" class="form-control" name="prices[${domainId}][]" placeholder="Price">
                    <select class="form-control" name="unit[${domainId}][]">
                        <option value="USD">USD</option>
                    </select>
                    <select class="form-control" name="package_name[${domainId}][]">
                        <option value="Standard">Standard</option>
                        <option value="Premium">Premium</option>
                        <option value="Gold">Gold</option>
                    </select>
                    <button type="button" class="btn btn-danger delete-price-field">Delete Price</button>
                </div>`;
            domainSection.appendChild(priceDiv);
        }

        // Delete price field
        if (event.target.classList.contains('delete-price-field')) {
            let priceField = event.target.closest('.new');
            if (priceField) {
                priceField.remove();
            }
        }

        // Delete domain section
        if (event.target.classList.contains('delete-domain')) {
            let domainSection = event.target.closest('.domain-section');
            if (domainSection) {
                domainSection.remove();
            }
        }
    });
});
@endif
</script>
@endsection
