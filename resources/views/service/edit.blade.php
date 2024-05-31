@extends('layouts.app')
<style>
 
    @media (min-width: 1200px) { 
        #select-all-countries{
            margin-left: 7%;
        }
        .step1.form-control{
            margin-left: 13px !important;
            
        }
        .step.form-control,.step1.form-control{
            width: 30% !important;
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
  .form-group label.country {
    padding-right: 0% !important;
  }
   .form-group label.name {
    padding-right: 8% !important;
  }
  #countries{
      height: auto;
      width: 30%;
      margin-left: 7% !important;
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
                <div class="card-header">Update Service Steps</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('service.update', $service->id) }}">
                        @csrf
                        @method('PUT')
                                <div class="form-row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label class = "country" for="countries">Select Countries</label>
                                            <select id="countries" class="m-2 text-center form-control" name="countries[]" multiple required>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id}}" @if(old('countries') == $country->id) selected @endif>{{ucfirst($country->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label class = "country" for="select-all-countries">Select All Countries</label>
                                            <input id="select-all-countries" type="checkbox" name="select_all_countries">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label class = "domain" for="countries">Select Domain</label>
                                            <select id="domains" class="m-2 text-center form-control" name="domains[]" multiple required>
                                                @foreach($domains as $domain)
                                                <option value="{{ $domain->id}}" @if(old('domains') == $domain->id) selected @endif>{{ucfirst($domain->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class = "domain" for="select-all-select_all_domains">Select All Domains</label>
                                            <input id="select-all-domains" type="checkbox" name="select_all_domains">
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="form-group step">
                                            <label for="steps">Business Step</label>
                                                <input id="step_0" type="text" class="step1 form-control" value="{{ old('steps[0]') }}" name="steps[]" placeholder="Step Name">
                                        </div>
                                            <div id="service_steps">
                                    
                                            </div>
                                            <button type="button" class="btn btn-success" id="add_step">Add Step</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

   <script>
        document.addEventListener('DOMContentLoaded', function() {
            let stepCount = 2;
            document.getElementById('add_step').addEventListener('click', function() {
                var stepDiv = document.createElement('div');
                stepDiv.classList.add('appendedrow');
                stepDiv.innerHTML = `
                    <div class="form-group step">
                        <label for="step_${stepCount}">Business Step ${stepCount}</label>
                        <input id="step_${stepCount}" type="text" class="step form-control" name="steps[]" placeholder="Step Name ${stepCount}">
                        <button type="button" class="btn btn-danger delete-step">Delete</button>
                    </div>
                `;
                document.getElementById('service_steps').appendChild(stepDiv);
                stepCount++;
            });
              document.addEventListener('click', function(event) {
                if (event.target.classList.contains('delete-step')) {
                    event.target.closest('.appendedrow').remove();
                    stepCount--;
                }
            });
          
        });
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
             document.getElementById('select-all-domains').addEventListener('change', function () {
            var domainsSelect = document.getElementById('domains');
            if (this.checked) {
                for (var i = 0; i < domainsSelect.options.length; i++) {
                    domainsSelect.options[i].selected = true;
                }
            } else {
                for (var i = 0; i < domainsSelect.options.length; i++) {
                    domainsSelect.options[i].selected = false;
                }
            }
             });
    </script>
@endsection
