@extends('layouts.app')
<style>
    .card {
        margin-top: 20px;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card{
        width: 100% !important;
    }

    .alert {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }
    .domain{
        width: 85% !important;
        margin-right: -12%;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .form-row {
        margin-bottom: 20px;
    }

    .btn {
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        width: 91px !important;
        height: 44px !important;
        margin-top: 96px !important;
        margin-bottom: 16px !important;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        height: 11% !important;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        margin-right: 11px !important;
        width: 137px !important;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .domain-section {
        border: 1px solid #b6c3d0;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #fff;
        width: 700px !important;
    }

    #add_domain{
        margin-left: 10px !important;
    }

    .price-section {
        margin-top: 10px !important;
        margin-left: 33% !important;
        width: 74% !important;
    }
    .add-price-field{
        height: auto !important;
        display: inline-block !important;
    }
    .delete-domain{
        margin-left: 96% !important;
        margin-top: -26% !important;
    }

    .price-field {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .price-field .form-control,
    .price-field select {
        width: auto;
        flex: 1;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }
    }
</style>

@section('content')
<div class="main-div">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Service and Domains</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
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
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">create</button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('service.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="name" for="service_name">Name</label>
                                    <input id="service_name" type="text" class="m-2 text-center form-control" placeholder="Name" name="service_name" value="{{ old('service_name') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="country" for="countries">Select Countries</label>
                                    <select id="countries1" class="m-2 text-center form-control" name="countries[]" multiple required>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id}}" @if(old('countries') == $country->id) selected @endif>{{ucfirst($country->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="country" for="select-all-countries">Select All Countries</label>
                                <input id="select-all-countries2" type="checkbox" name="select_all_countries">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">create</button>
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
                    <input id="domain_${domainCount}" type="text" class="domain name form-control" name="domains[]" placeholder="Domain Name ${domainCount}" required>
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
                    <button type="button" class="btn btn-danger delete-domain">Delete Domain</button>
                </div>
            </div>`;
    }

    document.getElementById('add_domain').addEventListener('click', function() {
        domainCount++;
        priceCounts[domainCount] = 1; 
        var domainDiv = document.createElement('div');
        domainDiv.innerHTML = createDomainSection(domainCount);
        document.getElementById('service_domains').appendChild(domainDiv);
    });
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
        if (event.target.classList.contains('delete-price-field')) {
            let priceField = event.target.closest('.new');
            if (priceField) {
                priceField.remove();
            }
        }
        if (event.target.classList.contains('delete-domain')) {
            let domainSection = event.target.closest('.domain-section');
            if (domainSection) {
                let domainId = domainSection.getAttribute('data-domain');
                domainSection.remove();
                domainCount--;
                let remainingDomainSections = document.querySelectorAll('.domain-section');
                remainingDomainSections.forEach((section, index) => {
                    if(index != 0){
                    console.log(index);
                    section.querySelector('label').textContent = `Domain ${index + 1}`;
                    section.querySelector('.name').placeholder = `Domain Name ${index + 1}`;
                    section.setAttribute('data-domain', index + 1);
                    }
                });
                delete priceCounts[domainId];
            }
        }
    });

});
@else
document.addEventListener('DOMContentLoaded', function() {
       document.getElementById('select-all-countries2').addEventListener('change', function () {
            var countriesSelect = document.getElementById('countries1');
            if (this.checked) {
                for (var i = 0; i < countriesSelect.options.length; i++) {
                    countriesSelect.options[i].selected = true;
                }
            } else {
                for (var i = 0; i < countriesSelect.options.length; i++) {
                    countriesSelect.options[i].selected = false;
                }
            }
           });
});
@endif
</script>
@endsection
