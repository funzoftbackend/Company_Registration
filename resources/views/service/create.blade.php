@extends('layouts.app')
<style>
 
    @media (min-width: 1200px) { 
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
                                                    <input id="service_id" type="hidden" class="form-control" value = "{{$_GET['service_id']}}" name="service_id" >
                                                    @php
                                                    $country_ids = urldecode($_GET['country_ids']);
                                                    $country_ids = explode(',', $country_ids);
                                                    @endphp
                                                    @foreach($country_ids as $country)
                                                    <input id="countries" type="hidden" class="form-control" value = {{$country}} name="countries[]" >
                                                    @endforeach
                                                    <input id="domain_0" type="text" class="domain1 form-control" value="{{ old('domains[0]') }}" required name="domains[]" placeholder="domain Name">
                                            </div>
                                                <div id="service_domains">
                                                </div>
                                                <button type="button" class="btn btn-success" id="add_domain">Add domain</button>
                                                <button type="submit" class="btn btn-primary">Create</button>
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
                                            <label class = "country" for="countries">Select Countries</label>
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
                                        <label class = "country" for="select-all-countries">Select All Countries</label>
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
            let domainCount = 2;
            document.getElementById('add_domain').addEventListener('click', function() {
                var domainDiv = document.createElement('div');
                domainDiv.classList.add('appendedrow');
                domainDiv.innerHTML = `
                    <div class="form-group domain">
                        <label for="domain_${domainCount}">Domain ${domainCount}</label>
                        <input id="domain_${domainCount}" type="text" class="domain form-control" name="domains[]" placeholder="domain Name ${domainCount}">
                        <button type="button" class="btn btn-danger delete-domain">Delete</button>
                    </div>
                `;
                document.getElementById('service_domains').appendChild(domainDiv);
                domainCount++;
            });
              document.addEventListener('click', function(event) {
                if (event.target.classList.contains('delete-domain')) {
                    event.target.closest('.appendedrow').remove();
                    domainCount--;
                }
            });
        });
        @else
        document.getElementById('select-all-countries').addEventListener('change', function () {
            var countriesSelect = document.getElementById('countries');
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
        @endif
        
    </script>
@endsection
